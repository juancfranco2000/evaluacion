<?php
    class Modelo{
        private $Modelo;
        private $data;
        private $db;
        public function __construct(){
            $this->Modelo = array();
            $this->db = new PDO('mysql:host=localhost; dbname=db','root', '');
        }
        //
        //Consulta para mostrar todos los registros de items del menú
        public function allItems(){
            $sql = "SELECT * FROM items";
            $res = $this->db->query($sql);
            while($row = $res->FETCHALL(PDO::FETCH_ASSOC)){
                $this->data[] = $row;
            }
            return $this->data;//Retornamos datos de consulta para controlador
        }

        //Consulta de items padre
        public function menuPadre(){
            $sql2 = "SELECT * FROM items WHERE categoria=1";
            $res2 = $this->db->query($sql2);
            while($row = $res2->FETCHALL(PDO::FETCH_ASSOC)){
                $this->data[] = $row;
            }
            return $this->data;//Retornamos datos de consulta para controlador
        }

        //Consulta específica de item
        public function menuItem($id){
            $sql = "SELECT * FROM items WHERE iditem=".$id;
            $res = $this->db->query($sql);
            while($row = $res->FETCHALL(PDO::FETCH_ASSOC)){
                $this->data[] = $row;
            }
            return $this->data;//Retornamos datos de consulta para controlador
        }

        //Insertar item padre
        public function insertItem($item, $descripcion, $categoria){
            $sql = "INSERT INTO items (nombre, descripcion, categoria) VALUES('".$item."', '".$descripcion."', ".$categoria.")";
            $res = $this->db->query($sql);
            //Validamos si la consulta fue exitosa
            if($res){
                return true;
            }else{
                return false;
            }
        }

        //Insertar nuevo dato hija
        public function insertItemHija($item, $descripcion, $categoria, $itemPadre){
            $sql = "INSERT INTO items (nombre, descripcion, categoria) VALUES('".$item."', '".$descripcion."', ".$categoria.")";
            $res = $this->db->query($sql);
            //Validamos si la consulta fue exitosa
            if($res){
                $sql2 = "INSERT INTO menu_categories( id_menu, id_menu_padre) VALUES((SELECT MAX(iditem) FROM items), ".$itemPadre.")";
                $res2 = $this->db->query($sql2);
                return true;
            }else{
                return false;
            }
        }

        //Actualizar item padre
        public function updateItem($id, $item, $descripcion, $categoria){
            $sql = "UPDATE items SET nombre='".$item."', descripcion='".$descripcion."', categoria=".$categoria." WHERE iditem=".$id;
            $res = $this->db->query($sql);
            //Validamos si la consulta fue exitosa
            if($res){
                return true;
            }else{
                return false;
            }
        }

        //Actualizar dato hija
        public function updateItemHija($id, $item, $descripcion, $categoria, $itemPadre){
            $sql = "UPDATE items SET nombre='".$item."', descripcion='".$descripcion."', categoria=".$categoria." WHERE iditem=".$id;
            $res = $this->db->query($sql);
            //Validamos si la consulta fue exitosa
            if($res){
                $sql2 = "UPDATE menu_categories SET id_menu_padre=".$itemPadre." WHERE id_menu=".$id;
                $res2 = $this->db->query($sql2);
                return true;
            }else{
                return false;
            }
        }

        //Eliminar clase
        public function eliminar($id){
            $sql = "SELECT * FROM menu_categories WHERE id_menu_padre=".$id;//Confirmamos si el item no tiene hijos
            $res = $this->db->query($sql);
            if(empty($res->FETCHALL(PDO::FETCH_ASSOC))){
                $sql3  = "DELETE FROM menu_categories WHERE id_menu=".$id;
                $res3 = $this->db->query($sql3);
                $sql2 = "DELETE FROM items WHERE iditem=".$id;
                $res2 = $this->db->query($sql2);
            }
            header("Location: ".urlsite);
        }

        //Consulta para estructura de menú
        public function menuView(){
            $sql = "SELECT id_menu, nombre, id_menu_padre FROM menu_categories INNER JOIN items ON id_menu=iditem";
            $res = $this->db->query($sql);
            while($row = $res->FETCHALL(PDO::FETCH_ASSOC)){
                $this->data[] = $row;   
            }
            return $this->data;//Retornamos datos de consulta para controlador
        }

        //Consulta de clase padre
        public function padreClass($id){
            $sql = "SELECT id_menu_padre FROM menu_categories WHERE id_menu=".$id;
            $res = $this->db->query($sql);
            while($row = $res->FETCHALL(PDO::FETCH_ASSOC)){
                $this->data[] = $row;   
            }
            return $this->data;//Retornamos datos de consulta para controlador
        }

        //Consulta los detalles de descripcion
        public function descripcionItem(){
            $sql = "SELECT iditem, descripcion FROM items";
            $res = $this->db->query($sql);
            while($row = $res->FETCHALL(PDO::FETCH_ASSOC)){
                $this->data[] = $row;   
            }
            return $this->data;//Retornamos datos de consulta para controladors
        }
    }
?>