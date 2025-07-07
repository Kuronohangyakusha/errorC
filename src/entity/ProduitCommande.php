<?php
namespace Vendor\Challenge2\entity;

class ProduitCommande{
    private int $id;
    private string $quantite;
    private string $montant;
    private Commande $commande;
    private Produit $produit;
    
    public function __construct($id, $quantite, $montant, $commande, $produit){
        $this->id = $id;
        $this->quantite = $quantite;
        $this->montant = $montant;
        $this->commande = $commande;
        $this->produit = $produit;
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

    public function getQuantite(){
        return $this->quantite;
    }
    
    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function getCommande(){
        return $this->commande;
    }
    
    public function setCommande($commande) {
        $this->commande = $commande;
    }

    public function getProduit(){
        return $this->produit;
    }
    
    public function setProduit($produit) {
        $this->produit = $produit;
    }
}