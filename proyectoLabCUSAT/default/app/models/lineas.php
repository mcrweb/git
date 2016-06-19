<?php

/**
 * @author MCR
 * @copyright 2016
 */
class Lineas extends ActiveRecord{
	public function getLineas($page, $ppage=20){
        return $this->paginate("page: $page","per_page: $ppage","order: id desc");
    }
}


?>