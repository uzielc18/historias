<?php 
/**
* 
*/
class Enfermedades extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('examenclinico');
		$this->belongs_to('filaciones','tipoenfermedad');
		$this->has_one('patologicos','fisiologicos');
	}
}
?>