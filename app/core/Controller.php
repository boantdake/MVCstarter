<?php 
//core class Controller
class Controller{

	public function model($model){
		require_once '../app/models/' . $model . '.php';
		return new $model();//creates a new instance of that model
	}
	

	public function view($url,$data = []){

		require_once '../app/views/'.$url.'.php';


	}
}

?>