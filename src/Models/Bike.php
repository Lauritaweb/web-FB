<?php
namespace App\Models;
use App\Config\Database;
class Bike
{
    /**************************************************************************************************************
     * 
     * SETUP AND CONSTRUCT
     * 
     ************************************************************************************************************ */

    private $db;
    private $table = 'clientes';
    protected $fields = [ 
        'apellido', 'nombre', 'celular', 'email', 'provincia', 'localidad', 
        'direccion', 'cp', 'fecha_nacimiento', 'genero', 'tipo_documento', 'edad'
    ];
    private $encryption_key = "h4rdTod3c0d33ncrypt!0nKeyH4s";

    public function __construct(){
        $this->db = (new Database())->getConnection();
    }
    

    /****************************************************************************************************************
     * 
     *                                           CRUD 
     * 
     ***************************************************************************************************************/

     public function getProductsByCategory($idCategory)
     {
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

     public function getFilteredProducts($idCategory = null, $sizes = [], $colors = []) {
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
    
        if (!empty($colors)) {
            $inColors = implode(',', array_map('intval', $colors));
            $where[] = "pv.id_color IN ($inColors)";
        }
    
        if (!empty($sizes)) {
            $inSizes = implode(',', array_map('intval', $sizes));
            $where[] = "pv.id_size IN ($inSizes)";
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
 
         return $elements;
    }
    


           
        // READ: Obtener un registro por ID
        public function get($id) {
            $query = "SELECT * FROM $this->table WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

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
    
        
        public function update($id, $data) {        
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
          
        public function delete($id) {
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

        public function emailExists($email) {
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
            $id,  $urlImageFile
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

        public function setActivationStatus($id, $status) {
            $query = "UPDATE $this->table 
                    SET active = ? 
                    WHERE id = ?";

            $stmt = $this->db->prepare($query);

            if ($stmt === false) 
                die('Prepare failed: ' . $this->db->error);    

            $stmt->bind_param(
                "ii",
                $status, $id
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

    /*
    public function findLawyer($tipo_abogado, $provincia, $localidad, $status = 2 ) {        
        $query = "SELECT 
                    affiliates.id, 
                    name,
                    last_name,                
                    affiliates.id_province,
                    id_locality,
                    url_file_image,       
                    GROUP_CONCAT(DISTINCT assigned_specialties.description SEPARATOR ', ') AS specialty,
                    affiliate_provinces.province,
                    localities.locality,
                    (
                        SELECT GROUP_CONCAT(
                            CASE 
                                WHEN cerrado = 1 THEN CONCAT(dia, ': Cerrado')
                                ELSE CONCAT(dia, ': ', TIME_FORMAT(hora_inicio, '%H:%i'), ' - ', TIME_FORMAT(hora_fin, '%H:%i'))
                            END
                            SEPARATOR '<br>'
                        )
                        FROM affliate_schedule
                        WHERE affliate_schedule.id_affiliate = affiliates.id
                    ) AS schedule
                FROM affiliates 
                LEFT JOIN affiliate_specilities_assigned ON affiliate_specilities_assigned.id_affiliate = affiliates.id
                LEFT JOIN affiliate_specialties AS assigned_specialties ON affiliate_specilities_assigned.id_speciality = assigned_specialties.id
                LEFT JOIN affiliate_provinces ON affiliate_provinces.id = affiliates.id_province
                LEFT JOIN localities ON localities.id = affiliates.id_locality
                
                WHERE active = $status";                    

        $conditions = [];
        if ($tipo_abogado != 0) {
            $conditions[] = "affiliate_specilities_assigned.id_speciality = " . intval($tipo_abogado);
        }
        if ($provincia != 0)  {
            $conditions[] = "affiliates.id_province = " . intval($provincia);
        }
        if ($localidad != 0 && $localidad != '') {
            $conditions[] = "id_locality = " . intval($localidad);
        }

        if (count($conditions) > 0) {
            $query .= " AND " . implode(" AND ", $conditions);
        }

        $query .= " GROUP BY affiliates.id";       

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
    */

    public function getLocalities($id_province) {        
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



    /***************************************************************************************************************
     * 
     * Generic Getters
     * 
     **************************************************************************************************************/

    public function getAllDocumentTypes(){
        return $this->getGenericTable("affiliate_document_types");        
    } 

    public function getAllProvinces(){
        return $this->getGenericTable("affiliate_provinces");        
    }

    public function getAllColors(){
        return $this->getGenericTable("sh_bike_colors");        
    }

    public function getAllSizes(){
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
