<?php
Load::models('proestadosprocesos');
View::template('backend/backend');
class ProestadosprocesosController extends AdminController {
	public function index($pag= 1) {
        try {
            $ep = new Proestadosprocesos();
            $this->proestadosprocesos = $ep->paginate("page: $pag");
        } catch (KumbiaException $e) {
            View::excepcion($e);
        }
    }
	public function crear() {
        $this->titulo = 'Crear Estado';
        try {
            if (Input::hasPost('proestadosprocesos')) {
                $ep = new Proestadosprocesos(Input::post('proestadosprocesos'));
				$ep->estado=1;
				$ep->userid=Auth::get('id');
				$ep->activo='0';
                if ($ep->save()) {
                    Flash::valid('Estado fué agregado Exitosamente...!!!');
                    Acciones::add("Agregó Estado {$ep->nombre} al sistema");
                    return Router::redirect();
                } else {
                    Flash::warning('No se Pudieron Guardar los Datos...!!!');
                }
            }
        } catch (KumbiaException $e) {
            View::excepcion($e);
        }
    }
	public function editar($id) {
        $this->titulo = 'Editar Estado';
        try {
            View::select('crear');

            $ep = new Proestadosprocesos();

            $this->proestadosprocesos = $ep->find_first($id);

            if (Input::hasPost('proestadosprocesos')) {
					$ep->userid=Auth::get('id');
                if ($ep->update(Input::post('proestadosprocesos'))) {
                    Flash::valid('El Estado fué actualizado Exitosamente...!!!');
                    Acciones::add("Editó el Estado {$ep->nombre}", 'proestadosprocesos');
                    return Router::redirect();
                } else {
                    Flash::warning('No se Pudieron Guardar los Datos...!!!');
                    unset($this->ep); //para que cargue el $_POST en el form
                }
            }
        } catch (KumbiaException $e) {
            View::excepcion($e);
        }
    }
	public function activar($id) {
        try {
            $id = Filter::get($id, 'digits');

            $ep = new Proestadosprocesos();

            if (!$ep->find_first($id)) { //si no existe
                Flash::warning("No existe ningun Estado con id '{$id}'");
            } else if ($ep->activar()) {
                Flash::valid("El Estado <b>{$ep->ep}</b> Esta ahora <b>Activo</b>...!!!");
                Acciones::add("Colocó al Estado {$ep->ep} como activo", 'proestadosprocesos');
            } else {
                Flash::warning("No se Pudo Activar el Estado <b>{$ep->ep}</b>...!!!");
            }
        } catch (KumbiaException $e) {
            View::excepcion($e);
        }
        Router::redirect();
    }
	public function desactivar($id) {
        try {
            $id = Filter::get($id, 'digits');

            $ep = new Proestadosprocesos();

            if (!$ep->find_first($id)) { //si no existe
                Flash::warning("No existe ningun Estado con id '{$id}'");
            } else if ($ep->desactivar()) {
                Flash::valid("El Estado <b>{$ep->ep}</b> Esta ahora <b>Inactivo</b>...!!!");
                Acciones::add("Colocó al Estado {$ep->ep} como inactivo", 'proestadosprocesos');
            } else {
                Flash::warning("No se Pudo Desactivar el Estado <b>{$ep->ep}</b>...!!!");
            }
        } catch (KumbiaException $e) {
            View::excepcion($e);
        }
        return Router::redirect();
    }
	public function eliminar($id) {
        try {
            $id = Filter::get($id, 'digits');

            $ep = new Proestadosprocesos();

            if (!$ep->find_first($id)) { //si no existe
                Flash::warning("No existe ningun Estado con id '{$id}'");
            } else if ($ep->delete()) {
                Flash::valid("El Estado <b>{$ep->ep}</b> fué Eliminado...!!!");
                Acciones::add("Eliminó el Estado {$ep->ep} del sistema", 'proestadosprocesos');
            } else {
                Flash::warning("No se Pudo Eliminar el Estado <b>{$ep->ep}</b>...!!!");
            }
        } catch (KumbiaException $e) {
            View::excepcion($e);
        }
        return Router::redirect();
    }

}
?>