<?php 
/**
* 
*/
class Reporteoperatorio extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('equipos');
		$this->belongs_to('filiaciones');
	}
}
?>