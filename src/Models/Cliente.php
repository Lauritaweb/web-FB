<?php
namespace App\Models;
use App\Config\Database;
class Cliente
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
    
        // CREATE: Inserta un nuevo registro
        public function create($data) {
            $fieldsList = implode(", ", $this->fields);
            $placeholders = implode(", ", array_fill(0, count($this->fields), "?"));
    
            $query = "INSERT INTO $this->table ($fieldsList) VALUES ($placeholders)";
            $stmt = $this->db->prepare($query);
            
            if (!$stmt) die('Error en prepare: ' . $this->db->error);
            
            $types = str_repeat("s", count($this->fields)); // Todos los valores como string
            $stmt->bind_param($types, ...array_values($data));
    
            return $stmt->execute() ? $this->db->insert_id : false;
        }
    
        // READ: Obtener un registro por ID
        public function get($id) {
            $query = "SELECT * FROM $this->table WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

        public function getAll($active = -1)
        {
            $query = "SELECT *
            FROM $this->table    
            ";
            
            if ($active != -1)
                $query .= " WHERE active = $active";
            
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
     * Generic Getters
     * 
     **************************************************************************************************************/

    public function getAllDocumentTypes(){
        return $this->getGenericTable("affiliate_document_types");        
    } 

    public function getAllProvinces(){
        return $this->getGenericTable("affiliate_provinces");        
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
