<?php
class Equipos extends ActiveRecord
{
    public function initialize()
    {
        //Relaciones
        //Un equipo tiene una linea
        $this->belongs_to('Lineas');
    }
	public function buscar(){
		return $this->find('Columns: serie');
	}
}