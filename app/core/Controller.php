<?php
namespace app\core;

class Controller
{
    protected function __autoload($name)
    {
        $namePart = explode("app\\", $name);
        $name = $namePart[count($namePart)-1];
        $parts = explode('\\', $name);
        $parts[count($parts)-1] = ucfirst($parts[count($parts)-1]);
        $file = __ROOT__.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR.implode(DIRECTORY_SEPARATOR, $parts).".php";
    
        if (file_exists($file)) {
            if (is_readable($file)) {
                require_once $file;
            } else {
                throw new \Exception("$file file does not readable.");
            }
        } else {
            throw new \Exception("$file file does not exists.");
        }
    }
    
    protected function getClassName($name)
    {
        $parts = explode('\\', $name);
        return $parts[count($parts)-1];
    }

    public function loadModel($model)
    {
        $className = $this->getClassName($model);
        $this->$className = new $model();
    }

    public function loadView($view, $data = false)
    {
        View::$vars[lcfirst($view)] = $data;
        $this->__autoload('app\\view\\'.$view);
    }
    
    public function loadClass($class, $args = false)
    {
        if ($args) {
            $this->$class = new $class($args);
        } else {
            $this->$class = new $class();
        }
    }
}
