<?php
View::template('apps/default');
class IndexController extends AdminController {
	protected function before_filter() {
        if ( Input::isAjax() ){
			View::response('view');
            //View::select(NULL, NULL);
        }
    }
    public function index()
	{
		//Validate::timeSession();
	}
	public function bienvenida()
	{}	
}
