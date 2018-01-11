<?php

/**
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 * */
// @see Controller nuevo controller
require_once CORE_PATH . 'kumbia/controller.php';

class AppController extends Controller {
public $estados=array('0'=>'Sin uso','1'=>'Activo','2'=>'Inactivo','3'=>'Papelera','9'=>'Privado');
public $meses=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
    final protected function initialize()
	{
		$modulo = Router::get('module');
		if($modulo=='santapatricia')
		{
			Session::set("EMPRESAS_ID",1);
			Session::set("EMPRESAS_NOMBRE",'TEXTIL SANTA PATRICIA');
			Session::set('INVENTARIO_ID',Session::get('INVENTARIO_ID_SP'));
		
		}
		if($modulo=='santacarmela')
		{
			Session::set("EMPRESAS_ID",2);
			Session::set("EMPRESAS_NOMBRE",'SANTA CARMELA');			
			Session::set('INVENTARIO_ID',Session::get('INVENTARIO_ID_SC'));
		}
		/*AL agregar mas Empresas agregar aqui los detalles por defecto */
    }

    final protected function finalize() {
        
    }

}