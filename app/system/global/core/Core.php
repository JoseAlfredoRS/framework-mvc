<?php
/*
	Mapear la URL ingresada en el navegador
	1. Controlador
	2. Metodo
	3. Parametro
 */
class Core
{
	protected $controladorActual = 'inicio';
	protected $metodoActual = 'index';
	protected $parametros = [];

	//constructor
	public function __construct()
	{
		// $route = new Web;

		$url = $this->getUrl();
		/*----CONTROLADOR----*/

		// $url[0] = $route->getController($url[0]);
		// $this->controladorActual = (empty($url[0])) ? "Errors" : $url[0];

		//Buscar en controladores si el controlador existe
		if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php') or empty($url[0])) {
			if (!empty($url[0])) {
				//Si existe se setea como controlador por defecto
				$this->controladorActual = ucwords($url[0]);
				unset($url[0]);	//unset indice
			}
			//requerir el controlador
			require_once '../app/controllers/' . $this->controladorActual . '.php';
			$this->controladorActual = new $this->controladorActual;
		} else {
			require_once '../app/controllers/Errors.php';
			$this->controladorActual = 'Errors';
			$this->controladorActual = new $this->controladorActual;
		}


		/*----METODO----*/
		//Chequea ala segunda parte de la URL que seria el metodo
		if (isset($url[1])) {
			//$urlArg = explode("-", $url[1]);
			$respuesta = strpos($url[1], '-');
			//if($respuesta!=false){

			//} else { 
			if (method_exists($this->controladorActual, $url[1]) == true) {
				//Chequeamos el metodo
				$this->metodoActual = $url[1];
				unset($url[1]);
				//echo $this->metodoActual;
			} else if (method_exists($this->controladorActual, $url[1]) == false) {
				require_once '../app/controllers/Errors.php';
				$this->controladorActual = 'Errors';
				$this->controladorActual = new $this->controladorActual;
			}
			//}
		}

		/*----PARAMETROS----*/
		//Obtener los posibles parametros
		$this->parametros = $url ? array_values($url) : [];
		//llamar callback con parametros array
		call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
	}

	public function getUrl()
	{
		//return $_GET['url'];
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode("/", $url);
			return $url;
		}
	}
}
