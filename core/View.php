<?php

namespace Core;



use Philo\Blade\Blade;



class View {

    protected $address;
    public $params = [];
    protected $blade ;
    public function __construct($address)
    {
        $this->address = $address;
        $views = __DIR__ . '/views';
        $cache = __DIR__ . '/cache';
        //$this->blade =  new Blade($views, $cache);
    }

    public function render()
    {
        // $parsedAddress = $this->parsViewAddress($this->address);
        // $viewAddress = __DIR__ . "/../app/Views/" . $parsedAddress . ".blade.php";

        // $content =  file_get_contents($viewAddress);

        // $views = __DIR__ . '/views';
        // $cache = __DIR__ . '/cache';

        // $blade = new Blade($views, $cache);
        //return $blade->compile()->make('hello')->render();

        // $factory = new ViewFactory();

        // return $factory->make($view, $data, $mergeData);

        $views = __DIR__ . "/../app/Views/" ;
        $cache = __DIR__ .  "/../cache/";

        $blade = new Blade($views, $cache);
        return $blade->view()->make('admin.users.index')->render();

    }

    public function parsViewAddress($address)
    {
        if(str_contains( $address , '.'))
        {
            $explodeAddress = explode('.' , $address);
            $finalAddress = '';
            foreach($explodeAddress as $key => $item)
            {
                $postfix = ($key + 1) != count($explodeAddress) ? '/' : '' ;
                $finalAddress .= $item . $postfix    ;
            }
            return $finalAddress;
            
        }else return $address;
    }

    public function viewCompiler($fileContent)
    {
        return $fileContent;
        $position = strpos($fileContent , "{{");
        
        $position = strpos("dafdf {{ adsfdasfdaf {{@amit}}" , "{{");

        dd($position , $fileContent);
    }


}