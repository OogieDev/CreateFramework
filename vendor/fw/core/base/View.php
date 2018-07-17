<?php

namespace fw\core\base;


class View {

    /**
     * текущий маршрут
     * @var array
     */
    public $route = [];

    /**
     * текущий вид
     * @var string
     */
    public $view;

    /**
     * текущий шаблон
     * @var string
     */
    public $layout;

    public $compress = false;

    public $scripts = [];

    public static $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route, $layout = '', $view = ''){
        $this->route = $route;
        if($layout === false){
            $this->layout = false;
        }
        else{
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    protected function compressPage($buffer){
        $search = [
            "/(\n)+/",
            "/\r\n+/",
            "/\n(\t)+/",
            "/\n(\ )+/",
            "/\>(\n)+</",
            "/\>\r\n</",
        ];
        $replace = [
            "\n",
            "\n",
            "\n",
            "\n",
            "><",
            "><",
        ];
        return preg_replace($search, $replace, $buffer);
    }

    public function render($vars){
        $this->route['prefix'] = str_replace('\\', '/', $this->route['prefix']);
        if(is_array($vars)) extract($vars); //extract создает из ключей массива переменные с соответствующими значениями.
        if($this->view === false){
            return;
        }
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";

        if(!$this->compress){
            ob_start(); //включаем буферизацию
        }
        else{
            ob_start([$this, 'compressPage']); //включаем буферизацию
        }
        if(is_file($file_view)){
            require $file_view;
        }else{
            throw new \Exception("<p>Не найден вид <b>$file_view</b></p>", 404);
        }

        if(!$this->compress){
            $content = ob_get_clean(); //очищает буфер обмена и складывает в переменную
        }
        else{
            $content = ob_get_contents();
            ob_clean();//очищает буфер обмена и складывает в переменную
        }

        if(false !== $this->layout){
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)){
                //подключение скриптов
                $content = $this->getScripts($content);
                $scripts = [];
                if(!empty($this->scripts[0])){
                    $scripts = $this->scripts[0];
                }

                require $file_layout;
            }else{
                throw new \Exception("<p>Не найден шаблон <b>$file_layout</b></p>", 404);
            }
        }

    }

    public function getScripts($content){
        //ищет все скрипты которые мы передали во вьюху вырезает их и запихивает в переменную
        //это все для того, чтобы мы могли подключать скрипты последовательно
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content,$this->scripts);
        if(!empty($this->scripts)){
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    public static function getMeta(){
        echo '<title>'. self::$meta['title'] .'</title>'
            . PHP_EOL .
            '<meta name="description" content="'. self::$meta['desc'] .'">'
            . PHP_EOL .
            '<meta name="keywords" content="'. self::$meta['keywords'] .'">';


    }

    public static function setMeta($title = '', $desc = '', $keywords = ''){
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['$keywords'] = $keywords;
    }

    public function getPart($file){
        $file = APP . "/views/{$file}.php";
        if(is_file($file)){
            require_once $file;
        }else{
            echo "File {$file} not found...";
        }
    }

}