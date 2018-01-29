<?php 
/**
* 
*/
class Filiaciones extends ActiveRecord
{
	
	public function initialize()
	{
		$this->has_many('enfermedades','reporteoperatorio');
		$this->belongs_to('sexos','situacionservicios','estadocivil','generos','gradoinstruccion');
		$this->has_one('acldatos')
	}
}
?>