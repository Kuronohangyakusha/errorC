<?php
namespace Vendor\Challenge3\core;
 

class ErrorController {
   

    public function pageError() {
        
        return require_once '../template/commande/error.php';
        
    }
}