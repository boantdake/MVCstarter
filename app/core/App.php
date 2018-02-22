<?php 
//core class app
class App {
//this will control most of the url processing
	protected $defaultMethod = "index";

	protected $defaultController = "Home";//sort of like saying if the controller we're trying to talk to doesn't exist we're simply going to use the default one.

	protected $parameters = [];





	public function __construct(){
	// testing with print_r and echo "this works<br>";
		$url = $this->processUrl();

		//this if statement unsets the defaultController so we can use the one that is being talked to.
		if(file_exists('../app/controllers/'.$url[0].'.php')){
			$this->defaultController = $url[0];
			unset($url[0]);
		}

		require_once('../app/controllers/' .$this->defaultController.'.php');

		$this->defaultController = new $this->defaultController;//instantiate and make it an object

		if(isset($url[1])){
			if(method_exists($this->defaultController,$url[1])){
			$this->defaultMethod = $url[1];
			unset($url[1]);
			}	
		}

		
		$this->parameters = $url ? array_values($url):[];
		// print_r($this->parameters);

		call_user_func_array([$this->defaultController,$this->defaultMethod],$this->parameters);
	}








	//process the get request
	public function processUrl(){
		
		if (isset($_GET['url'])) {
			return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));//what we're doing here is attempting to filter the url to make it clean and easy to use in our case we're going to explode the url into an array.
		}


	}


}


?>