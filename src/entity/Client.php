<?php
namespace Vendor\Challenge2\entity;

class Client extends Personne {
    private int $tel;
    private array $commande = [];

    public function __construct($tel, $id, $nom) {
        parent::__construct($id, $nom, TypeEnum::CLIENT);  
        $this->tel = $tel;
    }
    
    public function getTel(){
        return $this->tel;
    }
    
    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getCommande(){
        return $this->commande;
    }
    
    public function AddCommande($commande) {
        $this->commande[] = $commande;
    }
    
    protected function toObject($data): static{
        $client = new static(
            $data['tel'] ?? '',
            $data['id'] ?? 0,
            $data['nom'] ?? ''
        );
        return $client;
    }
    
    protected function toArray(): array {
        $data = parent::toArray();  
        $data['tel'] = $this->tel;
        $data['commande'] = array_map(function($cmd) {
            return $cmd->toArray();
        }, $this->commande);
        return $data;
    }
}