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

class AdminController extends Controller {
public $estados=array('0'=>'Sin uso','1'=>'Activo','2'=>'Inactivo','3'=>'Papelera','9'=>'Privado');
public $meses=array('01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
public $data=NULL;
    final protected function initialize() {

    	
		/*Validar el ID de la empresa*/
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
        		
		if (MyAuth::es_valido())
		{
			//View::template('backend/backend');
            $acl = new MyAcl();
            if (!$acl->check())
			{
				if ($acl->limiteDeIntentosPasado())
				{
                    $acl->resetearIntentos();
                    return $this->intentos_pasados();
                }
                Flash::error('No posees privilegios para acceder a <b>' . Router::get('route') . '</b>');
                View::select(NULL);
                return FALSE;
            }else
			{
                $acl->resetearIntentos();
            }
			
			/*if(!Validate::timeSession())
			{
				Flash::error('Supero el tiempo de inactividad (2 minutos)<b>'.Router::get('route').'</b>');
				Session::get('time_session'); 
				//Router::redirect('/'.Router::get('route'));
				View::select(NULL, 'backend/logueo');
				//View::template('backend/logueo');
			}else
			{
				Session::set('time_session',time());
				Session::get('time_session');
			}*/
			
			
        } elseif (Input::hasPost('login') && Input::hasPost('clave')) {
            if(MyAuth::autenticar(Input::post('login'), Input::post('clave'))) {
                Flash::info('Bienvenido al Sistema <b>' . Auth::get('nombres') . '</b>'.Router::get('route'));
				
				return Router::route_to();
            } else {
                Flash::warning('Datos de Acceso Invalidos');
                View::select(NULL, 'backend/logueo');
                return FALSE;
            }
        } else {
        	//Flash::warning('Datos de Acceso Invalidos no hay usuario ni clave');
            View::select(NULL, 'backend/logueo');
            return FALSE;
        }
    }

    final protected function finalize() {
        
    }

    public function logout() {
        MyAuth::cerrar_sesion();
		Flash::info('Gracias el Sistema <b> Fue Cerrado con Exito</b>');
        return Router::redirect('/');
    }

    protected function intentos_pasados() {
        MyAuth::cerrar_sesion();
        Flash::warning('Has Sobrepasado el limite de Intentos Fallidos al tratar acceder a Ciertas Partes del Sistema');
        return Router::redirect('/');
    }

}