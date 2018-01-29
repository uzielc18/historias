<?php 
/**
* 
*/
class Patologicos extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_one('enfermedades');
		/*$this->belongs_to('aclempresas');*/
	}
}
?>