<?php 
View::template('backend/backend');
class AdminAcldatosController extends ScaffoldController
{
	public $model='acldatos';
	public $columns='id,nombre,appaterno,apmaterno,dni';
}
?>