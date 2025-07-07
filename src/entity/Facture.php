<?php
namespace Vendor\Challenge2\entity;

class Facture{
    private int $id;
    private string $numero;
    private string $montant;
    private StatutEnum $statutEnum;
    private Commande $commande;
    private array $paiement = [];
    
    public function __construct($id, $numero, $montant, $statutEnum, $commande){
        $this->id = $id;
        $this->numero = $numero;
        $this->montant = $montant;
        $this->statutEnum = $statutEnum;
        $this->commande = $commande;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNumero(){
        return $this->numero;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNumero($numero) {
        $this->numero = $numero;
    }
    
    public function getMontant(){
        return $this->montant;
    }
    
    public function setMontant($montant) {
        $this->montant = $montant;
    }
    
    public function getStatutEnum(){
        return $this->statutEnum;
    }
    
    public function setStatutEnum($statutEnum) {
        $this->statutEnum = $statutEnum;
    }
    
    public function getCommande(){
        return $this->commande;
    }
    
    public function setCommande($commande) {
        $this->commande = $commande;
    }
    
    public function getPaiement(){
        return $this->paiement;
    }
    
    public function addPaiement($paiement) {
        $this->paiement[] = $paiement;
    }
}
