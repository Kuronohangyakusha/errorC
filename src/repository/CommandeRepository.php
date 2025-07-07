<?php
namespace Vendor\Challenge2\repository;

use Vendor\Challenge3\core\AbstractRepository;
use Vendor\Challenge3\database\Database;

class CommandeRepository extends AbstractRepository {
    private \PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }
    
    public function selectAll() {
        try {
            $sql = "SELECT 
                        c.id,
                        c.numero_commande,
                        c.quantite,
                        c.date_commande,
                        cl.nom as client_nom,
                        cl.tel as client_tel,
                        v.nom as vendeur_nom,
                        f.numero as facture_numero,
                        f.montant as facture_montant,
                        f.statut as facture_statut
                    FROM commandes c
                    LEFT JOIN clients cl ON c.client_id = cl.id
                    LEFT JOIN vendeurs v ON c.vendeur_id = v.id
                    LEFT JOIN factures f ON c.facture_id = f.id
                    ORDER BY c.date_commande DESC";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Erreur lors de la récupération des commandes: " . $e->getMessage());
            return [];
        }
    }
    
    public function insert() {
        // À implémenter
    }
    
    public function update() {
        // À implémenter
    }
    
    public function delete() {
        // À implémenter
    }
    
    public function selectById($id) {
        try {
            $sql = "SELECT 
                        c.*,
                        cl.nom as client_nom,
                        cl.tel as client_tel,
                        v.nom as vendeur_nom,
                        f.numero as facture_numero,
                        f.montant as facture_montant,
                        f.statut as facture_statut
                    FROM commandes c
                    LEFT JOIN clients cl ON c.client_id = cl.id
                    LEFT JOIN vendeurs v ON c.vendeur_id = v.id
                    LEFT JOIN factures f ON c.facture_id = f.id
                    WHERE c.id = :id";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\PDOException $e) {
            error_log("Erreur lors de la récupération de la commande: " . $e->getMessage());
            return null;
        }
    }
    
    public function selectBy(array $filter) {
        try {
            $sql = "SELECT 
                        c.id,
                        c.numero_commande,
                        c.quantite,
                        c.date_commande,
                        cl.nom as client_nom,
                        cl.tel as client_tel,
                        v.nom as vendeur_nom,
                        f.numero as facture_numero,
                        f.montant as facture_montant,
                        f.statut as facture_statut
                    FROM commandes c
                    LEFT JOIN clients cl ON c.client_id = cl.id
                    LEFT JOIN vendeurs v ON c.vendeur_id = v.id
                    LEFT JOIN factures f ON c.facture_id = f.id
                    WHERE 1=1";
            
            $params = [];
            
            if (isset($filter['statut'])) {
                $sql .= " AND f.statut = :statut";
                $params[':statut'] = $filter['statut'];
            }
            
            if (isset($filter['client_id'])) {
                $sql .= " AND c.client_id = :client_id";
                $params[':client_id'] = $filter['client_id'];
            }
            
            $sql .= " ORDER BY c.date_commande DESC";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Erreur lors du filtrage des commandes: " . $e->getMessage());
            return [];
        }
    }
    
    public function createCommande(array $data): bool {
        try {
            $this->pdo->beginTransaction();
            
            // Créer la facture d'abord
            $sqlFacture = "INSERT INTO factures (numero, montant, statut) VALUES (:numero, :montant, :statut)";
            $stmtFacture = $this->pdo->prepare($sqlFacture);
            $stmtFacture->execute([
                ':numero' => $data['numero_facture'],
                ':montant' => $data['montant'],
                ':statut' => 'impaye'
            ]);
            
            $factureId = $this->pdo->lastInsertId();
            
            // Créer la commande
            $sqlCommande = "INSERT INTO commandes (numero_commande, quantite, client_id, vendeur_id, facture_id, date_commande) 
                           VALUES (:numero_commande, :quantite, :client_id, :vendeur_id, :facture_id, NOW())";
            $stmtCommande = $this->pdo->prepare($sqlCommande);
            $stmtCommande->execute([
                ':numero_commande' => $data['numero_commande'],
                ':quantite' => $data['quantite'],
                ':client_id' => $data['client_id'],
                ':vendeur_id' => $data['vendeur_id'],
                ':facture_id' => $factureId
            ]);
            
            $this->pdo->commit();
            return true;
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            error_log("Erreur lors de la création de la commande: " . $e->getMessage());
            return false;
        }
    }
}