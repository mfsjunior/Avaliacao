<?php

namespace App;

use App\Controllers\HomeController;
use Exception;

class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public  $controllerName;

    /* Variáveis locais que controla a execução do código*/

    public function __construct()
    {
        /*
         * Constantes do sistema
         informações importantes do sistema
         define formas de acesso
         usuário e senha do banco de dados 
         especifica o drive do banco de dados
         */
define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/projetotecinformatica/mvc-php-basico");
        //guarda a URL do sistema 
        define('PATH'           , realpath('./'));
        //guarda um string para nos ajudar na navegação
        define('TITLE'          , "Primeira aplicação MVC em PHP ");
        //guarda o título do site, usando em todas as páginas
        define('DB_HOST'        , "localhost");
        //define o local onde está nosso BD 
        define('DB_USER'        , "root");
        //define o usuário de acesso
        define('DB_PASSWORD'    , "");
        //define a senha 
        define('DB_NAME'        , "auladw");
        //define o nome do banco de dados
        define('DB_DRIVER'      , "mysql");
        //informa o drive de acesso ao nosso banco (todos os bancos têm)

        $this->url();
    }

    public function run()
    {

        /* Método principal do sistema 
        */
        if ($this->controller) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
            //Caso exista, trata o resultado utilizando a função ucwords, convertendo para maiúsculas o primeiro caractere, concatenado com palavra Controller.
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
            // Utiliza a expressão regular para remover qualquer caractere diferente de (A até Z e a até z)
             
        } else {
            $this->controllerName = "HomeController";
            //Se não encontrar nenhum controller, por padrão, o atributo controller recebe como padrão “HomeController”.
        }
        

        $this->controllerFile   = $this->controllerName . '.php';//O atributo controllerFile recebe o nome da classe controller e concatena com a extensão PHP para que seja verificada a existência deste arquivo mais a frente.
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);//para remover qualquer caractere diferente de (A até Z e a até z)


        if (!$this->controller) {
            //Caso o atributo controller não tenha sido definido, a aplicação instanciará HomeController.
            $this->controller = new HomeController($this);
            $this->controller->index();
        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {//Verifica se arquivo da classe controller solicitada existe.
            throw new Exception("Página não encontrada.", 404);
        }

        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;//A variável $nomeClasse recebe o nome com caminho completo da classe controller.
        $objetoController = new $nomeClasse($this);//A variável $objetoController recebe a instância do objeto controller solicitado.

        if (!class_exists($nomeClasse)) {//Verifica se a classe solicitada existe através da função nativa do PHP
            throw new Exception("Erro na aplicação", 500);
        }
        
        if (method_exists($objetoController, $this->action)) {//Verifica se método da classe instanciada existe através da função nativa do PHP.
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        } else {
            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
        }
        throw new Exception("Página não encontrada.", 404);
    }

    public function url () {

        if ( isset( $_GET['url'] ) ) {

            $path = $_GET['url'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getParams()
    {
        return $this->params;
    }

    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}