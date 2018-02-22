<?php 

// echo "Hello from Home.php controller";
class Home extends Controller{//the extends Controller is referring to the one in core so core/Controller.php

	public function index($title = ''){//$name <- old $title <- new is set from the Post.php in the models directory
		// echo "this is home controller";
		// $user = $this->model('Post');
		// $user->name = "Bo Dake";
		// $user->title ="The main man";
#		$user->save();	Theres no save method in the controller yet but thats where it would be in order to save the above object into the database.
		$post = $this->model('Post');
		$post->title = "Bo Dake";
		
		$this->view('home',['title'=>$post->title]);



	}

	public function register(){
		echo "starting to register here";
	}






}

?>