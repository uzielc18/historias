<?php 
/**
* 
*/
class Equipos extends ActiveRecord
{
	
	public function initialize()
	{
		/*$this->has_many('');*/
		$this->belongs_to('acldatos','reporteoperatorio','aclcargos');
	}
}
?>