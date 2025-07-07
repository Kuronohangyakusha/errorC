<?php
namespace Vendor\Challenge2\entity;

class Commande{
    private int $id;
    private int $Quantite;
    private Client $client;
    private Vendeur $vendeur;
    private Facture $facture;
    private array $ProduitCommande = [];
    
    public function __construct(int $id, int $Quantite, Client $client, Vendeur $vendeur, Facture $facture){
        $this->id = $id;
        $this->Quantite = $Quantite;
        $this->client = $client;
        $this->vendeur = $vendeur;
        $this->facture = $facture;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getQuantite(){
        return $this->Quantite;
    }
    
    public function setQuantite($Quantite) {
        $this->Quantite = $Quantite;
    }

    public function getVendeur(){
        return $this->vendeur;
    }
    
    public function setVendeur($vendeur) {
        $this->vendeur = $vendeur;
    }
    
    public function getClient(){
        return $this->client;
    }
    
    public function setClient($client) {
        $this->client = $client;
    }
    
    public function getFacture(){
        return $this->facture;
    }
    
    public function setFacture($facture) {
        $this->facture = $facture;
    }

    public function getProduitCommande(){
        return $this->ProduitCommande;
    }
    
    public function addProduitCommande($ProduitCommande) {
        $this->ProduitCommande[] = $ProduitCommande;
    }
}
