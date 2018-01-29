<?php 
/**
* 
*/
class Gradoinstruccion extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('filiaciones');
	}
}
?>