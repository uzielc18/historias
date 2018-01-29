<?php 
/**
* 
*/
class Estadocivil extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('filaciones');
		/*$this->belongs_to('aclempresas');*/
	}
}
?>