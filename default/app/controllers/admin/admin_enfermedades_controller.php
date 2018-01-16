<?php 
View::template('backend/backend');
class AdminEnfermedadesController extends ScaffoldController
{
	public $model='enfermedades';
	public $columns='id,nombre,inicio';
}
?>