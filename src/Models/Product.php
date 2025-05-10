<?php
namespace App\Models;

use App\Config\Database;

class Product
{
    /**************************************************************************************************************
     * 
     * SETUP AND CONSTRUCT
     * 
     ************************************************************************************************************ */

    private $db;
    private $table = 'products';
    protected $fields = [
        'none'       
    ];
    private $encryption_key = "h4rdTod3c0d33ncrypt!0nKeyH4s";

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }


    /****************************************************************************************************************
     * 
     *                                           CRUD 
     * 
     ***************************************************************************************************************/

    public function getProductsByCategory($idCategory){
        $query = "
                 SELECT
                    p.*,
                    c.description AS Categoria,
                    pc.description AS PreCategoria,
                    sc.description AS Subcategoria,
                    pp.url AS Foto
                FROM products p
                LEFT JOIN subcategories sc ON sc.id = p.id_subcategory
                LEFT JOIN categories c ON c.id = sc.id_category
                LEFT JOIN precategories pc ON pc.id = sc.id_pre_category
                LEFT JOIN (
                    SELECT product_id, MIN(id) AS min_id
                    FROM product_pictures
                    GROUP BY product_id
                ) pp_min ON pp_min.product_id = p.id
                LEFT JOIN product_pictures pp ON pp.id = pp_min.min_id
                WHERE sc.id = $idCategory;
         ";

        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $stmt->close();

        return $users;
    }

    public function getFilteredProducts($idCategory = null, $sizes = [], $colors = [], $prices = []){
        $where = [];
        $params = [];

        $sql = "SELECT 
                    p.id, 
                    p.name, 
                    p.price, 
                    p.saleprice, 
                    c.description as category,
                    (SELECT url FROM product_pictures WHERE product_id = p.id LIMIT 1) as image
                FROM products p
                JOIN product_variants pv ON p.id = pv.product_id
                LEFT JOIN subcategories sc ON sc.id = p.id_subcategory
                LEFT JOIN categories c on c.id = p.id_category
                LEFT JOIN (
                    SELECT product_id, MIN(id) AS min_id
                    FROM product_pictures
                    GROUP BY product_id
                ) pp_min ON pp_min.product_id = p.id

                ";

        $priceConditions = [];
        $params = [];

        if (!empty($prices)) {
            foreach ($prices as $range) {
                if (strpos($range, '-') !== false) {
                    list($min, $max) = explode('-', $range);
                    $priceConditions[] = "(p.price BETWEEN ? AND ?)";
                    $params[] = $min;
                    $params[] = $max;
                }
            }

            if (!empty($priceConditions)) {
                $where[] = '(' . implode(' OR ', $priceConditions) . ')';
            }
        }

        if (!empty($sizes)) {
            $validSizes = array_filter($sizes, function ($s) {
                return intval($s) !== 0;
            });
            if (!empty($validSizes)) {
                $inSizes = implode(',', array_map('intval', $validSizes));
                $where[] = "pv.id_size IN ($inSizes)";
            }
        }

        if (!empty($colors)) {
            $validColors = array_filter($colors, function ($c) {
                return intval($c) !== 0;
            });
            if (!empty($validColors)) {
                $inColors = implode(',', array_map('intval', $validColors));
                $where[] = "pv.id_color IN ($inColors)";
            }
        }

        if (!empty($idCategory)) {
            if (is_array($idCategory)) {
                $placeholders = implode(',', array_fill(0, count($idCategory), '?'));
                $where[] = "p.id_subcategory IN ($placeholders)";
                $params = array_merge($params, $idCategory);
            } else {
                $where[] = "p.id_subcategory = ?";
                $params[] = $idCategory;
            }
        }

        if (!empty($where)) {
            $sql .= " WHERE " . implode(' AND ', $where);
            $sql .= " AND active = 1 ";
        }else 
            $sql .= " WHERE active = 1";
        

        $sql .= " GROUP BY p.id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->get_result();

        $elements = [];
        while ($row = $result->fetch_assoc()) {
            $elements[] = $row;
        }

        $stmt->close();

        return $elements;
    }

    public function getProductWithVariantsSlug($slugSubcategory, $slugProduct){
        $query = "
        SELECT p.id
        FROM products p
        JOIN categories c ON c.id = p.id_category
        WHERE p.name = ? AND c.description = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $slugProduct, $slugSubcategory);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if (!$product) {
            http_response_code(404);
            echo "Producto no encontrado";
            exit;
        }
        return $product;
    }

    public function getProductWithVariants($idProduct){
        // 1. Obtener el producto
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $idProduct);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if (!$product) return null;

        // 2. Obtener variantes del producto
        $query = "  SELECT
                        product_variants.*, 
                        sh_bike_sizes.description as size,
                        sh_bike_colors.description as color
                    FROM
                        product_variants 
                    LEFT JOIN sh_bike_sizes on product_variants.id_size = sh_bike_sizes.id
                    LEFT JOIN sh_bike_colors on product_variants.id_color = sh_bike_colors.id
                WHERE product_id = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $idProduct);
        $stmt->execute();
        $variantsResult = $stmt->get_result();

        $sizes = [];
        $colors = [];
        $images = [];
        //  echo $idProduct;die;

        // 3. Obtener imágenes 
        $queryImg = "SELECT * FROM product_pictures WHERE product_id = ?";
        $stmtImg = $this->db->prepare($queryImg);
        $stmtImg->bind_param("s", $idProduct);
        $stmtImg->execute();
        $imgResult = $stmtImg->get_result();


        while ($img = $imgResult->fetch_assoc()) {
            if (!in_array($img['url'], $images)) {
                $images[] = $img['url'];
            }
        }


        while ($variant = $variantsResult->fetch_assoc()) {
            // Sumar tamaños únicos
            if (!in_array($variant['size'], $sizes)) {
                $sizes[] = $variant['size'];
            }

            // Sumar colores únicos
            if (!in_array($variant['color'], $colors)) {
                $colors[] = $variant['color'];
            }
        }

        return [
            'product' => $product,
            'sizes' => $sizes,
            'colors' => $colors,
            'images' => $images
        ];
    }

    public function getProductCategoryAndName($id){
        $query = "
        SELECT c.description as category,
        p.name 
        FROM products p
        JOIN categories c ON c.id = p.id_category
        WHERE p.id = ? 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        if (!$product) {
            http_response_code(404);
            echo "Producto no encontrado";
            exit;
        }
        return $product;
    }


    public function getSubCategory($idSubcategory){
        if (is_array($idSubcategory)) {
            // Generar los placeholders (?, ?, ?, ...)
            $placeholders = implode(',', array_fill(0, count($idSubcategory), '?'));
            $query = "  SELECT precategories.description as subCategory, categories.description as category  
                        FROM subcategories 
                        LEFT OUTER JOIN precategories on id_pre_category = precategories.id 
                        INNER JOIN categories on categories.id = subcategories.id_category
                        WHERE subcategories.id IN ($placeholders)";

            $stmt = $this->db->prepare($query);

            // Armar el tipo de datos para bind_param: todos enteros -> 'iii...'
            $types = str_repeat('i', count($idSubcategory));
            $stmt->bind_param($types, ...$idSubcategory);
        } else {
            // Si es un solo ID, usamos la versión original
            $query = "SELECT subcategories.description as subCategory,categories.description as category  FROM subcategories INNER JOIN categories on categories.id = subcategories.id_category WHERE subcategories.id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $idSubcategory);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        // Si es array devolvemos todas, si es uno solo devolvemos una
        //  return is_array($idSubcategory) ? $result->fetch_all(MYSQLI_ASSOC) : $result->fetch_assoc();
        return $result->fetch_assoc();
    }



    public function getRandomProducts($idCategory = null, $cantidad = 5)
    {
        $where = [];
        $params = [];

        $sql = "SELECT 
                    p.id, 
                    p.name, 
                    p.price, 
                    p.saleprice, 
                    (SELECT url FROM product_pictures WHERE product_id = p.id LIMIT 1) as image
                FROM products p
                JOIN product_variants pv ON p.id = pv.product_id
                LEFT JOIN subcategories sc ON sc.id = p.id_subcategory
                LEFT JOIN (
                    SELECT product_id, MIN(id) AS min_id
                    FROM product_pictures
                    GROUP BY product_id
                ) pp_min ON pp_min.product_id = p.id

                ";

        if (!empty($idCategory)) {
            if (is_array($idCategory)) {
                $placeholders = implode(',', array_fill(0, count($idCategory), '?'));
                $where[] = "p.id_subcategory IN ($placeholders)";
                $params = array_merge($params, $idCategory);
            } else {
                $where[] = "p.id_subcategory = ?";
                $params[] = $idCategory;
            }
        }


        if (!empty($where)) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }

        // Evitar duplicados por múltiples variantes
        $sql .= " GROUP BY p.id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->get_result();

        $elements = [];
        while ($row = $result->fetch_assoc()) {
            $elements[] = $row;
        }

        $stmt->close();

        $rta = $this->obtenerElementosAleatorios($elements, $cantidad);

        return $rta;
    }

    private function obtenerElementosAleatorios(array $array, int $n): array
    {
        // Si el número solicitado es mayor o igual a la cantidad de elementos disponibles, devolvemos el array completo
        if ($n >= count($array)) {
            return $array;
        }

        // Obtenemos claves aleatorias
        $clavesAleatorias = array_rand($array, $n);

        // Si se pide solo 1, array_rand devuelve una sola clave, no un array
        if ($n === 1) {
            $clavesAleatorias = [$clavesAleatorias];
        }

        // Armamos el nuevo array con las claves seleccionadas
        $resultado = [];
        foreach ($clavesAleatorias as $clave) {
            $resultado[$clave] = $array[$clave];
        }

        return $resultado;
    }

    public function getSubcategoriesPrices($idSubcategory)
    {
        $where = [];
        $params = [];
        $types = '';
        
        if (!empty($idSubcategory)) {
            if (is_array($idSubcategory)) {
                $query = "SELECT 
                            MAX(max_price) AS max_price,
                            MIN(min_price) AS min_price
                          FROM subcategories_ranges";
    
                $placeholders = implode(',', array_fill(0, count($idSubcategory), '?'));
                $where[] = "id_subcategory IN ($placeholders)";
                $params = $idSubcategory;
                $types = str_repeat('i', count($idSubcategory));
            } else {
                $query = "SELECT 
                            MAX(max_price) AS max_price,
                            MIN(min_price) AS min_price
                          FROM subcategories_ranges";
    
                $where[] = "id_subcategory = ?";
                $params[] = $idSubcategory;
                $types = 'i';
            }
    
            if (!empty($where)) {
                $query .= " WHERE " . implode(' AND ', $where);
            }
    
            $stmt = $this->db->prepare($query);
    
            if (!$stmt) {
                throw new \Exception("Error en prepare: " . $this->db->error);
            }
    
            // Vincular parámetros dinámicamente
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
    
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    
        return null;
    }
    
    public function getSubcategoriesApplyFilters($idSubCategory){
        if (is_array($idSubCategory))
            $useThisIdSubCategory =  $idSubCategory[0];
        else 
            $useThisIdSubCategory = $idSubCategory;

        $query = "  SELECT * FROM `subcategories`
                    WHERE id = ?
                    and id_category = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $useThisIdSubCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        $reg = $result->fetch_assoc();

        return ($reg != null && count($reg));
    }




    // NO VAN MAS



    public function getAll($active = 1)
    {
        $query = "
                    SELECT -- sh_bike_combinations.*,
                    sh_bikes.description, 
                    sh_bikes.characteristics,
                    sh_bike_colors.description as color,
                    sh_bike_sizes.description as size,
                    sh_currency.description as currency,
                    sh_bike_combinations.cost

                    FROM `sh_bike_combinations`
                    inner Join sh_bikes on sh_bikes.id = sh_bike_combinations.id_bycicle
                    INNER JOIN sh_bike_colors on sh_bike_colors.id = sh_bike_combinations.id_color
                    INNER JOIN sh_bike_sizes on sh_bike_sizes.id = sh_bike_combinations.id_size 
                    INNER JOIN sh_currency on sh_currency.id = sh_bike_combinations.id_currency
                    where active = $active
                    -- and id_bycicle = 1 
            ";

        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $stmt->close();

        return $users;
    }


    public function update($id, $data)
    {
        $setClause = implode(", ", array_map(fn($field) => "$field = ?", array_keys($data)));      // Construimos dinámicamente la parte SET del UPDATE

        $query = "UPDATE $this->table SET $setClause WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if (!$stmt)
            die('Error en prepare: ' . $this->db->error);

        $types = str_repeat("s", count($data)) . "i";  // "ssssssssi" // Armamos los tipos (todas cadenas excepto el ID que es entero)

        $values = array_values($data); // Creamos un array de valores y agregamos el ID al final
        $values[] = $id;

        $stmt->bind_param($types, ...$values); // Vinculamos parámetros dinámicamente

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "UPDATE $this->table 
            SET active = 0 
            WHERE id = ?";
        $stmt = $this->db->prepare($query);
        if ($stmt === false)
            die('Prepare failed: ' . $this->db->error);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function emailExists($email)
    {
        $query = "SELECT * FROM `affiliates` WHERE email = ?";
        $stmt = $this->db->prepare($query);

        if ($stmt === false)
            die('Prepare failed: ' . $this->db->error);


        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $numRows = $result->num_rows;

        $stmt->close();

        return $numRows > 0;
    }


    public function updateImage(
        $id,
        $urlImageFile
    ) {
        $query = "UPDATE $this->table SET 
            url_file_image = ?
            WHERE id = ?";

        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->db->error);
        }

        $stmt->bind_param(
            "si",
            $urlImageFile,
            $id
        );

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function setActivationStatus($id, $status)
    {
        $query = "UPDATE $this->table 
                    SET active = ? 
                    WHERE id = ?";

        $stmt = $this->db->prepare($query);

        if ($stmt === false)
            die('Prepare failed: ' . $this->db->error);

        $stmt->bind_param(
            "ii",
            $status,
            $id
        );

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }






    /***************************************************************************************************************
     * 
     * Satelite
     * 
     **************************************************************************************************************/
    public function getLocalities($id_province)
    {
        $query = "SELECT id, locality FROM localities WHERE id_province = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_province);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $localities = [];
        while ($row = $result->fetch_assoc()) {
            $localities[] = $row;
        }

        $stmt->close();
        return $localities;
    }

    public function getShowColors(){
        $query = "SELECT * FROM sh_bike_colors WHERE display = 1";

        $stmt = $this->db->prepare($query);
        if ($stmt === false) 
            die('Prepare failed: ' . $this->db->error);
        
         $stmt->execute();
        $result = $stmt->get_result();

        $response = [];
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

        $stmt->close();

        return $response;
    }

    public function getShowSizes(){
        $query = "SELECT * FROM sh_bike_sizes WHERE display = 1";

        $stmt = $this->db->prepare($query);
        if ($stmt === false) 
            die('Prepare failed: ' . $this->db->error);
        
        $stmt->execute();
        $result = $stmt->get_result();

        $sizes = [];
        while ($row = $result->fetch_assoc()) {
            $sizes[] = $row;
        }

        $stmt->close();
        return $sizes;
    }




    /***************************************************************************************************************
     * 
     * Generic Getters
     * 
     **************************************************************************************************************/

    public function getAllDocumentTypes()
    {
        return $this->getGenericTable("affiliate_document_types");
    }

    public function getAllProvinces()
    {
        return $this->getGenericTable("affiliate_provinces");
    }

    public function getAllColors()
    {
        return $this->getGenericTable("sh_bike_colors");
    }

    public function getAllSizes()
    {
        return $this->getGenericTable("sh_bike_sizes");
    }



    public function getGenericTable($table)
    {
        $query = "SELECT * FROM $table";
        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . $this->db->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $response = [];
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

        $stmt->close();

        return $response;
    }
}
