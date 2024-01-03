<?php
//Load the model and the view
class Controller {
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }
    //Load the view (check for the file)
    public function view($view, $data = []) {
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' .$view . '.php';
        }else {
            //View does not exists
            require_once '../app/views/404.php';
        }
    }
}