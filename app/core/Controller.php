<?php
namespace app\core;

class Controller
{
    protected function __autoload($name)
    {
        $name = ucfirst($name);
        $inc_path = [
            __ROOT__."/app/model/$name.php",
            __ROOT__."/app/view/$name.php",
            __ROOT__."/app/class/$name.php"
        ];
    
        $stop = false;
        for ($i=0; $i<count($inc_path) && !$stop; $i++) {
            $inc = $inc_path[$i];
            if (file_exists($inc)) {
                $stop = true;
                if (is_readable($inc)) {
                    include_once $inc;
                } else {
                    throw new \Exception("$name.php file does not readable.");
                }
            }
        }
        
        if (!$stop) {
            throw new \Exception("$name.php file does not exists.");
        }
    }
    
    public function loadModel($model)
    {
        $this->$model = new $model();
    }

    public function loadView($view, $data = false)
    {
        View::$vars[lcfirst($view)] = $data;
        $this->__autoload($view);
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
