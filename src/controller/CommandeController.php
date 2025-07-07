<?php
namespace Vendor\Challenge2\controller;
use Vendor\Challenge3\core\AbstractController;
class CommandeController extends  AbstractController{
    
    public function index(){}
    public function edit(){}
    public function show(){}
    public function delete(){}
    
     
  
    public function create() {
        
       $this->render('commande/listerCommande');
        
    }

    public function store(){
        
         $this->render('commande/form');
    }
 
}