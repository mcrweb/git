<?php
class Buscar extends ActiveRecord
{

public function getBuscarEquipo($busca) {
        return $this->find();
    }
}
?>