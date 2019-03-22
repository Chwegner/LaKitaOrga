<?php
/**
 * Created by PhpStorm.
 * User: OstSan
 * Date: 23.02.2019
 * Time: 00:22
 * © : 2019
 */


class Bootstrap {

	private $_url = null;
	private $_controller = null;

	private $_controllerPath = 'controllers/'; // Immer am Ende ein /
	private $_modelPath = 'models/'; // Immer am Ende ein /
	private $_errorFile = 'err.php';
	private $_defaultFile = 'index.php';
	private $_UsrRights = null;

    /**
     * Starts the Bootstrap
     * 
     * @return boolean
     */
	public function init() {
		
		// protected $_url setzen
		$this->_getUrl();
        $this->_UsrRights = new UsrRights();
        // Laden des DefaultControllers wenn keine URL übergeben
        // eg: Visit http://localhost it loads Default Controller
		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			return false;
		}		
		
		$this->_loadExistingController();

		$this->_callControllerMethod();
			
	}

    /**
     * (Optional) Einen anderen Pfad für controllers
     * @param string $path
     */
    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/') . '/';
    }
    
    /**
     * (Optional) Einen anderen Pfad für models
     * @param string $path
     */
    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/') . '/';
    }
    
    /**
     * (Optional) Eine andere Datei als ErrorDatei nutzen
     * @param string $path Benutzt den Dateinamen als Controller, eg: error.php
     */
    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }

    /**
     * (Optional) Eine abweichende Startseite setzen
     * @param string $path Benutzt den Dateinamen als Controller, eg: index.php
     */
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }

    /**
     * $_GET 'url' prüfen und zerlegen
     */
	private function _getUrl()
	{
		$this->_url = isset($_GET['url']) ? $_GET['url'] : null;
		#$this->_url = str_replace('-', '', $this->_url);
		$this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
		$this->_url = rtrim($this->_url, '/');
		$this->_url = explode('/', $this->_url);
	}

    /**
     * Default Controller lader wenn keine URL übergeben wurde
     */
	private function _loadDefaultController()
	{
		require $this->_controllerPath . $this->_defaultFile;
		$this->_controller = new Index();
        $this->_controller->loadModel("index");
        $this->_controller->index();

    }

    /**
     * Laden wenn der Controller exestiert
     * 
     * @return boolean|string
     */
	private function _loadExistingController()
	{
		$file = $this->_controllerPath . $this->_url[0] . '.php';
		if (file_exists($file)) {
			require $file;
			$this->_controller = new $this->_url[0];
			$this->_controller->loadModel($this->_url[0]);
		} else {
			$this->_error();
		}

	}

    /**
     * Wenn die methode exestiert param übergeben
     * 
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
	private function _callControllerMethod()
	{
	    $conti = strtolower(get_class($this->_controller));
	    if(empty($this->_url[1])){
	        $meti = 'index';
        }else {
            $meti = $this->_url[1];
        }
	    $conti = $conti.'/'.$meti;
		$length = count($this->_url);

		// Überprüfen ob die Methode im Controller vorhanden
		if ($length > 1) {

		    if($this->_UsrRights->CheckLVL(Session::get("u_rights"),$conti)) {
                if (!method_exists($this->_controller, $this->_url[1])) {
                    $this->_error();
                }
            }else{
		        $this->_error('urights_false');
            }
		}else{
            if(!$this->_UsrRights->CheckLVL(Session::get("u_rights"),$conti)) {
                $this->_error('urights_false');
            }
        }
		
		// Aussuchen was geladen werde muß
		switch ($length) {
            case 6:
                //Controller->Method(Param1, Param2, Param3, Param4)
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
                break;
			case 5:
				//Controller->Method(Param1, Param2, Param3)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;
			
			case 4:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;
			
			case 3:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			
			case 2:
				//Controller->Method(Param1, Param2)
				$this->_controller->{$this->_url[1]}();
				break;
			
			default:
				$this->_controller->index();
				break;
		}
		
	}
	
    /**
     * Fehlerseite anzeigen wenn nix existiert
     * und Programmablauf beenden
     */
	private function _error($seite = 'index') {
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new Err();
		$this->_controller->$seite();
        exit;
	}

}