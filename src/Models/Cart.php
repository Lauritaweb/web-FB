<?php
namespace App\Models;
use App\Config\Database;

class Cart{

    /**************************************************************************************************************
     * 
     * SETUP AND CONSTRUCT
     * 
     ************************************************************************************************************ */

     private $db;
 
     public function __construct(){
         $this->db = (new Database())->getConnection();
     }
     
     
     public function savePurchase($cliente, $cart){
        $cliente_id = $this->saveClient($cliente);
        $this->saveCart($cliente_id,$cart);        
     }

     
     private function saveClient($cliente){                
        // 1. Insertar cliente
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, apellido, email, telefono, direccion, localidad) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $cliente['nombre'], $cliente['apellido'], $cliente['email'], $cliente['telefono'], $cliente['direccion'], $cliente['localidad']);
        $stmt->execute();
        $cliente_id = $stmt->insert_id;
        $stmt->close();

       return $cliente_id;
     }

     private function saveCart($cliente_id, $cart){
      //  var_dump($cart);
        extract($cart);
        // 2. Insertar orden
        $fecha = date('Y-m-d H:i:s');
        $stmt = $this->db->prepare("INSERT INTO ordenes (cliente_id, subtotal, envio, total, fecha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iddds", $cliente_id, $subtotal, $envio, $total, $fecha);
        $stmt->execute();
        $orden_id = $stmt->insert_id;
        $stmt->close();

        // 3. Insertar cada ítem del carrito
        $stmt = $this->db->prepare("INSERT INTO orden_items (orden_id, producto_id, nombre_producto, cantidad, precio_unitario, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
        foreach ($productos as $item) {
            $item_subtotal = $item['price'] * $item['quantity'];
            $stmt->bind_param(
                "iisidd",
                $orden_id,
                $item['id'],
                $item['name'],
                $item['quantity'],
                $item['price'],
                $item_subtotal
            );
            $stmt->execute();
        }
        $stmt->close();

     }

     public function sendMessage($cliente,$cart){
        extract($cliente);
        extract($cart);
        $telefonoVendedor = "5491123456789"; // con código de país, sin + ni 00

        $mensaje = "¡Hola! Tengo una nueva orden de compra 🛒\n\n";
        $mensaje .= "🧑 Cliente: {$cliente['nombre']} {$cliente['apellido']}\n";
        $mensaje .= "📧 Email: {$cliente['email']}\n";
        $mensaje .= "📱 Teléfono: {$cliente['telefono']}\n";
        $mensaje .= "🏠 Dirección: {$cliente['direccion']}, {$cliente['localidad']}\n\n";
        $mensaje .= "🛍 Productos:\n";

        foreach ($productos as $item) {
            $mensaje .= "- {$item['name']} x{$item['quantity']} - $" . number_format($item['price'], 2) . "\n";
        }
    
        $mensaje .= "\n📅 Fecha: " . date('d/m/Y H:i');

        $urlWhatsapp = "https://api.whatsapp.com/send?phone={$telefonoVendedor}&text=" . urlencode($mensaje);

        // Redirigí al usuario a WhatsApp Web
        header("Location: $urlWhatsapp");
        exit;

     }
 
 

}


