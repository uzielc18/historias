<?php

Load::models('aclmenus'); 

class Menu {
    /**
     * Constante que define que solo va a mostrar los
     * Items del menu para app
     */
    const APP = 1;

    /**
     * Constante que define que solo va a mostrar los
     * Items del menu para el backend
     */
    const BACKEND = 2;

    /**
     * Id del rol del usuario logueado actualmente
     *
     * @var int 
     */
	 

    protected static $_id_rol = NULL;

    public static function render($id_rol, $entorno = self::BACKEND, $ubicacion,$attr='') {
        self::$_id_rol = $id_rol;
        $rL = new Aclmenus();
        $registros = $rL->obtener_menu_por_rol($id_rol, $entorno, $ubicacion);
        $html = '';
        if ($registros) {
            $html .= '<ul '.$attr.'>' . PHP_EOL;
            foreach ($registros as $e) {
                $html .= self::generarItems($e, $entorno,$ubicacion,$e->id);
            }
            $html .= '</ul>' . PHP_EOL;
        }
        return $html;
    }

    protected static function generarItems($objeto_menu, $entorno, $ubicacion,$id) {
        $sub_menu = $objeto_menu->get_sub_menus(self::$_id_rol, $entorno, $ubicacion);
        //$class = 'dropdown menu_' . str_replace('/', '_', $objeto_menu->url);
       $menu_padre_activo=self::es_activa($objeto_menu->url);

        $class='';
		if($ubicacion==1)$class='dropdown';
		if($ubicacion==3)$class='treeview';
		$span_clas=$objeto_menu->class_new;
		if ($sub_menu)
		{
			
			$caret='<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
            $a_class=$objeto_menu->class_new;
			if($ubicacion==1)
			{
				$caret=' <b class="caret"></b>';$a_class='class="dropdown-toggle" data-toggle="dropdown"';
				$span_clas='';
			}
			
            $html = "<li id='{$objeto_menu->id}' class='{$class}'>" .
					'<a href="'.$objeto_menu->url.'"><i class="fa fa-'.$span_clas.'"></i><span>'.
					$objeto_menu->nombre.$menu_padre_activo.'</span>'.$caret.'</a>'. PHP_EOL;
        } else {
			if($ubicacion==1)
			{
				$span_clas='';
			}
            $html = "<li class='{$class}{$menu_padre_activo}' data-parent_id='{$id}'>" .
                    Html::link($objeto_menu->url,'<i class="fa fa-'.$span_clas.'"></i><span>'.$objeto_menu->nombre.'</span>','class="dropdown-toggle"') . PHP_EOL;
        }
        if ($sub_menu)
		{
			$clas='';
			if($ubicacion==1){$clas=' class="dropdown-menu"';}
			if($ubicacion==3){$clas=' class="treeview-menu"';}
            $html.= '<ul'.$clas.'>' . PHP_EOL;
            foreach ($sub_menu as $e) {
                $html .= self::generarItems($e, $entorno,$ubicacion,$id);
            }
            $html .= '</ul>' . PHP_EOL;
        }
        return $html . "</li>" . PHP_EOL;
    }

    protected static function es_activa($url) {
        $return='';
        $url_actual = substr(Router::get('route'), 1);        
        $pos=explode('/',$url_actual);
        $url_actual_sin_parametros=$pos[0]."/".$pos[1];
        if(strpos($url, $url_actual_sin_parametros) !== false || strpos($url, "url_actual_sin_parametros/index") !== false){
            $return = ' active';
        }
        return $return;
    }		

}
?>