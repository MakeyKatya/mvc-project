<?php

class Bootstrap
{
    /**
     * @var array $_url Url to check
     */
    private $_url = null;

    /**
     * @var $_controller Controller to call
     */
    private $_controller = null;

    private $_controllerPath = 'controllers/'; // Always include trailing slash
    private $_modelPath = 'models/'; // Always include trailing slash
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    /**
     * Bootstrap initiate.
     */
    public function init()
    {
        /** Sets the protected $_url*/
        $this->getUrl();
        /** Load the default contoller if no Url exists*/
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }
        /** Load the controller and call the method if exist */
        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

    /**
     * (Optional) Set a custom path to controllers
     * @param string $path
     */
    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path to models
     * @param string $path
     */
    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: error.php
     */
    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }
    /**
     * (Optional) Set a custom path to the error file
     * @param string $path Use the file name of your controller, eg: index.php
     */
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }
    /**
     * Fetches the $_GET from 'url'
     */
    private function getUrl(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * Loads default controller if there is no parameter passed
     */
    private function _loadDefaultController(){
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    /**
     * Loads an existing controller if there is no parameter passed
     */
    private function _loadExistingController(){
        $file = $this->_controllerPath . $this->_url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            exit;
        }
    }

    /**
     * Calling methods if passed in GET request as parameter
     *
     * If a method is passed in the GET url parameter
     *
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
    private function _callControllerMethod(){

        $length = count($this->_url);

        /** Make sure the method we are calling exists  */
        if ($length > 1) {
            $method = $this->_url[1];
            if (!method_exists($this->_controller, $method)) {
                $this->_error();
                exit;
            }
        }

        switch ($length) {
            case 5:
                /**Controller->Method(Param1, Param2, Param3)*/
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                /**Controller->Method(Param1, Param2)*/
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                /**Controller->Method(Param1, Param2)*/
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                /**Controller->Method(Param1, Param2)*/
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }

    /**
     * Call an error if no controller exists
     * @return bool
     */
    private function _error() {
        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        return false;
    }

}
