<?php 
/**
* 
*/
class Examenes extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('examenclinico');
		$this->belongs_to('tipoexamenes','medidas');
	}
}
?>