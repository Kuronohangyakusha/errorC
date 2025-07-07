<?php
namespace Vendor\Challenge2\repository;

use Vendor\Challenge3\core\AbstractRepository;
use Vendor\Challenge3\database\Database;
use Vendor\Challenge2\entity\Vendeur;

class PersonneRepository extends AbstractRepository {
    private \PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }
    
    public function selectAll() {
        $sql = "SELECT * FROM vendeurs";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function insert() {
        // À implémenter selon vos besoins
    }
    
    public function update() {
        // À implémenter selon vos besoins
    }
    
    public function delete() {
        // À implémenter selon vos besoins
    }
    
    public function selectById($id) {
        $sql = "SELECT * FROM vendeurs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function selectBy(array $filter) {
        // À implémenter selon vos besoins
    }
    
    public function selectByLoginAndPassword(string $login, string $password): ?array {
        try {
            $sql = "SELECT * FROM vendeurs WHERE login = :login LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            
            return null;
        } catch (\PDOException $e) {
            error_log("Erreur lors de la connexion: " . $e->getMessage());
            return null;
        }
    }
    
    public function createVendeur(array $data): bool {
        try {
            $sql = "INSERT INTO vendeurs (nom, login, password, matricule, tel) VALUES (:nom, :login, :password, :matricule, :tel)";
            $stmt = $this->pdo->prepare($sql);
            
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            
            $stmt->bindParam(':nom', $data['nom']);
            $stmt->bindParam(':login', $data['login']);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':matricule', $data['matricule']);
            $stmt->bindParam(':tel', $data['tel']);
            
            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Erreur lors de la création du vendeur: " . $e->getMessage());
            return false;
        }
    }
}