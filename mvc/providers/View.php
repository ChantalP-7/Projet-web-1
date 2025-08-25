<?php
namespace App\Providers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View {
    static public function render($template, $data = [], $file = []){
        $loader = new FilesystemLoader('views');
        $twig = new Environment($loader);
        $twig->addGlobal('asset', ASSET);
        $twig->addGlobal('base', BASE);
        $twig->addGlobal('upload', UPLOAD);
        echo $twig->render($template.'.php', $data, $file);
    }
    static public function redirect($url){
            header('location:'.BASE.'/'.$url);
    }
}