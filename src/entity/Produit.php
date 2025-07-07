<?php
namespace Vendor\Challenge2\entity;

 

class Produit{
    private int $id;
    private string $quantiteStock;
    private int $montant;
    private array $ProduitCommande = [];
    
    public function __construct($id, $quantiteStock, $montant){
        $this->id = $id;
        $this->quantiteStock = $quantiteStock;
        $this->montant = $montant;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getMontant(){
        return $this->montant;
    }
    
    public function setMontant($montant) {
        $this->montant = $montant;
    }
    
    public function getQuantiteStock(){
        return $this->quantiteStock;
    }
    
    public function setQuantiteStock($quantiteStock) {
        $this->quantiteStock = $quantiteStock;
    }
    
    public function getProduitCommande(){
        return $this->ProduitCommande;
    }
    
    public function addProduitCommande($ProduitCommande) {
        $this->ProduitCommande[] = $ProduitCommande;
    }
}
