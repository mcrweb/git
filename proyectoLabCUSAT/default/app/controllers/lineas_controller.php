<?php

/**
 * @author MCR
 * @copyright 2016
 */
Load::models('lineas');

class LineasController extends AppController{
/**
 * Obtencion de lista
 */
    public function index($page=1){
        $linea = new Lineas();
        $this->listLineas = $linea->getLineas($page);
        //View::templates('index');
    } 
/**
 * Crea un registro
 */
    public function create(){
        /**
         * Verificacion de envio de submit
         */
        if(Input::hasPost('lineas')){
            
            $linea = new Lineas(Input::post('lineas'));
            if($linea->create()){
                Flash::valid("Operaci�n exitosa");
                Input::delete();
                return Redirect::to();
            }
            else
            {
                Flash::error('Fall� Operaci�n');    
            }
        }
    } 
    /**
     * Edita un registro
     */
    public function edit($id){
        $linea = new LIneas();
        if(Input::hasPost('lineas')){
            if($linea->update(Input::post('lineas'))){
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
            $this->lineas = $linea->find_by_id((int)$id);    
        }
    }
    /**
     * Elimina un registro
     */
     public function del($id){
        $linea = new Lineas();
        if($linea->delete($id)){
            Flash::valid('Operaci�n exitosa');
        }
        else
        {
            Flash::error('Fall� operaci�n');
        }
        Return redirect::to();
     }
}

?>