<?php 
/**
* 
*/
class Medidas extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('examenes');
		/*$this->belongs_to('aclempresas');*/
	}
}
?>