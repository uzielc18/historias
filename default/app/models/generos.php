<?php 
/**
* 
*/
class Generos extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('filiaciones');
		/*$this->belongs_to('aclempresas');*/
	}
}
?>