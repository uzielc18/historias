<?php 
/**
* 
*/
class Tipoenfermedad extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('enfermedades');
	}
}
?>