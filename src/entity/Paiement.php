<?php

namespace Vendor\Challenge2\entity;
use Vendor\Challenge3\core\AbstractEntity;

class Paiement extends AbstractEntity {
    private int $id;
    private int $numero;
    private int $montant;
    private Vendeur $vendeur;
    private Facture $facture;
    
    public function __construct($id, $numero, $montant, $vendeur, $facture){
        $this->id = $id;
        $this->numero = $numero;
        $this->montant = $montant;
        $this->vendeur = $vendeur;
        $this->facture = $facture;
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

    public function getVendeur(){
        return $this->vendeur;
    }
    
    public function setVendeur($vendeur) {
        $this->vendeur = $vendeur;
    }

    public function getFacture(){
        return $this->facture;
    }
    
    public function setFacture($facture) {
        $this->facture = $facture;
    }
       
    protected function toObject($data): static{
        $paiement = new static(
            $data['id'] ?? 0,
            $data['numero'] ?? '',
            $data['montant'] ?? '',
            $data['vendeur'] ?? null,
            $data['facture'] ?? null
        );
        return $paiement;
    }

    protected function toArray(): array {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
            'montant' => $this->montant,
            'Vendeur' => $this->vendeur->toArray(),
            'Facture' => $this->facture->toArray(),
        ];
    }
}