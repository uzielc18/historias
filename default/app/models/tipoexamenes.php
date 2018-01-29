<?php 
/**
* 
*/
class Tipoexamenes extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('tipoexamenes');
		$this->belongs_to('examenes');
	}
}
?>