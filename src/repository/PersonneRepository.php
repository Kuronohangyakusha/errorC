<?php
namespace Vendor\Challenge2\repository;

use Vendor\Challenge3\core\AbstractRepository;
use Vendor\Challenge3\database\Database;

 class PersonneRepository extends AbstractRepository{
    private \PDO $pdo;

    public function __construct(){
        $this->pdo = Database::getConnexion();
    }
    public function selectAll(){} 
    public function insert(){}
    public function update(){}
    public function delete(){}
    public function selectById(){}
    public function selectByLoginAndPassword($login,$password){}
}