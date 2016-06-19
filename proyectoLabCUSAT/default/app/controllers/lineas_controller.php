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
                Flash::valid("Operación exitosa");
                Input::delete();
                return Redirect::to();
            }
            else
            {
                Flash::error('Falló Operación');    
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
                Flash::valid('Operación exitosa');
                return Redirect::to();
            }
            else
            {
                Flash::error('Falló operación');
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
            Flash::valid('Operación exitosa');
        }
        else
        {
            Flash::error('Falló operación');
        }
        Return redirect::to();
     }
}

?>