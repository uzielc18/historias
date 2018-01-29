<?php 
/**
* 
*/
class Fisiologicos extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_one('enfermedades')
	}
}
?>