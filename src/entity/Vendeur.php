<?php
namespace Vendor\Challenge2\entity;
 
class Vendeur extends Personne {
    private int $tel;
    private string $login;
    private string $password;
    private string $matricule;
    private array $commande = [];
    private array $paiement = [];
    
    public function __construct($matricule, $tel, $id, $nom,$login,$password) {
        parent::__construct($id, $nom, TypeEnum::VENDEUR);  
        $this->matricule = $matricule;
        $this->tel = $tel;
        $this->login = $login;
        $this->password = $password;
    }
    
    public function getTel(){
        return $this->tel;
    }
    
    public function setTel($tel) {
        $this->tel = $tel;
    }
      public function getlogin(){
        return $this->login;
    }
    
    public function setlogin($login) {
        $this->login = $login;
    }
     public function getpassword(){
        return $this->password;
    }
    
    public function setpassword($password) {
        $this->password = $password;
    }
    
    public function getMatricule(){
        return $this->matricule;
    }
    
    public function setMatricule($matricule) {
        $this->matricule = $matricule;
    }

    public function getCommande(){
        return $this->commande;
    }
    
    public function addCommande($commande) {
        $this->commande[] = $commande;
    }
    
    public function getPaiement(){
        return $this->paiement;
    }
    
    public function addPaiement($paiement) {
        $this->paiement[] = $paiement;
    }

    protected function toObject($data): static{
        return new static(
            $data['matricule'] ?? '',
            $data['tel'] ?? 0,
            $data['id'] ?? 0,
            $data['nom'] ?? '',
            $data['login'] ?? '',
            $data['password'] ?? ''
        );
    }
    
    protected function toArray(): array {
        $data = parent::toArray(); 
        $data['tel'] = $this->tel;
        $data['login'] = $this->login;
        $data['password'] = $this->password;
        $data['matricule'] = $this->matricule;
       
        $data['paiement'] = array_map(function($pmt) {
            return $pmt->toArray();
        }, $this->paiement);
        $data['commande'] = array_map(function($cmd) {
            return $cmd->toArray();
        }, $this->commande);
        return $data;
    }
}
