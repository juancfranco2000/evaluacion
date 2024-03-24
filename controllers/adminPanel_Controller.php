<?php
    require_once("models/index.php");
    class AdminControlador{
        private $model;
        public function __construct(){
            $this->model = new Modelo();
        }
        //Función para retornar a vista de admin_panel
        static function index(){
            $modelo = new Modelo(); // llamamos y guardamos variable para consulta de datos
            $items = $modelo->allItems(); //Guardamos resultados
            require_once("views/admin_panel.php"); //Enviamos información a vista de admin_panel
        }

        //Registro de items del menú
        static function registro(){
            $modelo = new Modelo();
            $padre_class = $modelo->menuPadre();//Consultamos todos los items padre
            require_once('views/registro.php');//Enviamos información a vista registros
        }
        //Editar item de menu
        static function editItem(){
            $id_item = $_REQUEST['id'];
            $modelo = new Modelo();
            $menu_item = $modelo->menuItem($id_item);//Consultamos item
            $modelo2 = new Modelo();
            $padre_class = $modelo2->menuPadre();//Consultamos todos los items padre
            $modelo3 = new Modelo();
            $id_padre_class= $modelo->padreClass($id_item);//Consultamos id de item padre
            require_once('views/editar.php');//Enviamos información a vista registros
        }

        //Eliminar item demenu
        static function deleteItem(){
            $id_item = $_REQUEST['id'];//Tomamos id de request
            $modelo = new Modelo();
            $data = $modelo->eliminar($id_item);//Enviamos id para eliminar dato
            //header("Location: ".urlsite);
        }

        //guardar datos de items
        static function Guardar(){
            $modelo = new Modelo();
            $item = $_REQUEST['item'];
            $descripcion = $_REQUEST['descripcion'];
            if($_REQUEST['padre_menu']=='padre'){
                $categoria = 1;
                $data = $modelo->insertItem($item, $descripcion, $categoria);
            }else{
                $categoria = 2;
                $itemPadre = $_REQUEST['padre_menu'];
                $data = $modelo->insertItemHija($item, $descripcion, $categoria, $itemPadre);
            }
            
            header("Location: ".urlsite);
        }

        //Editar informacion
        static function Actualizar(){
            $modelo = new Modelo();
            $id = $_REQUEST['id'];
            $item = $_REQUEST['item'];
            $descripcion = $_REQUEST['descripcion'];
            if($_REQUEST['padre_menu']=='padre'){
                $categoria = 1;
                $data = $modelo->updateItem($id, $item, $descripcion, $categoria);
            }else{
                $itemPadre = $_REQUEST['padre_menu'];
                if($id != $itemPadre){
                    $categoria = 2;
                    $data = $modelo->updateItemHija($id, $item, $descripcion, $categoria, $itemPadre);
                }else{
                    header("Location: ".urlsite);
                }
            }
            header("Location: ".urlsite);
        }

        //Redireccionar a menu
        static function menu(){
            $modelo = new Modelo(); // Clase para consulta de datos
            $menu = $modelo->allItems();
            $modelo2 = new Modelo();
            $submenu = $modelo2->menuView();
            require_once("views/menu.php");//Enviamos información a vista de menu
        }
    }
?>