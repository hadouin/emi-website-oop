<?php
namespace Emi;

use Emi\Controllers\{
    WelcomeController,
    LoginController,
    NotFoundController,
    SignupController,
    LogsController,
    AppController
};

require __DIR__ . '/../vendor/autoload.php';

class Route
{
    private string $path;
    private $callable;
    private array $matches = [];
    private array $params = [];

    public function __construct(string $path, callable|string $callable){
        $this->path = trim($path, '/');  // On retire les / inutiles à la fin
        $this->callable = $callable;
    }

    /**
     * Permettra de capturer l'url avec les paramètre
     * get('/posts/:slug-:id') par exemple
     **/
    public function match(string $url): bool
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:(\w+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch($match): string
    {
        if(isset($this->params[$match[1]])){
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }


    public function call()
    {
        if(is_string($this->callable)){
            $params = explode('#', $this->callable);
            $controller = "Emi\\Controllers\\" . $params[0] . "Controller";
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    public function with($param, $regex): Route
    {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this; // On retourne tjrs l'objet pour enchainer les arguments
    }

    public function getUrl($params): string
    {
        $path = $this->path;
        foreach($params as $k => $v){
            $path = str_replace(":$k", $v, $path);
        }
        return $path;
    }

}