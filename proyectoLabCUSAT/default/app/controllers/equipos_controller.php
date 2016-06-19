<?php

/**
 * @author MCR
 * @copyright 2016
 */

Load::models('equipos');


class equiposController extends AppController{
    public function index(){
        $equipo = new equipos();
        $this->equipos = $equipo->find();
        //View::template('');
    }
	
	public function buscar(){
		if(Input::hasPost('serie')){
			$sre = Input::post("serie");
		}
        $equipo = new equipos();
		if($sre == ""){
			$this->equipos = $equipo->find();
		}
		else{
        $this->equipos = $equipo->find("conditions: id='$sre' or serie='$sre'");
        }
		View::template('');
		Input::delete();
		return;
    
	}
    public function create(){
        if(Input::hasPost('equipos')){
            $equipo = new Equipos(Input::hasPost('equipos'));
            if($equipo->create(Input::post('equipos'))){
                Flash::valid('Operaci�n exitosa');
                Input::delete();
                
            }
            else
            {
                Flash::error('Fall� operaci�n');
            }
        }
    }
    public function edit($id){
        $equipo = new Equipos();
        if(Input::hasPost('equipos')){
            if($equipo->update(Input::post('equipos'))){
                Flash::valid('Operaci�n exitosa');
                return Redirect::to();
            }
            else
            {
                Flash::error('Fall� operaci�n');
            }
        }
        else
        {
            $this->equipos = $equipo->find_by_id((int)$id);
        }
    }
    public function del($id){
        $equipo = new Equipos;
        if($equipo->delete($id)){
            Flash::valid('Operaci�n exitosa');
        }
        else
        {
            Flash::error('Fall� operaci�n');
        }    
        return Redirect::to();
    }
    
}
?>