<?php
 
 
namespace Vendor\Challenge2\entity;
use Vendor\Challenge3\core\AbstractEntity;
abstract class Personne extends AbstractEntity{
    private int $id;
    private string $nom;
    private TypeEnum $TypeEnum;
    
    public function __construct(int $id, string $nom, TypeEnum $TypeEnum){
        $this->id = $id;
        $this->nom = $nom;
        $this->TypeEnum = $TypeEnum;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function getTypeEnum(): TypeEnum {
        return $this->TypeEnum;
    }

    public function setTypeEnum($TypeEnum) {
        $this->TypeEnum = $TypeEnum;
    }

    protected function toObject($data): static {
        return new static(
            $data['id'] ?? 0,
            $data['nom'] ?? '',
            $data['TypeEnum'] ?? TypeEnum::Client
        );
    }
    
    protected function toArray(): array{
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'TypeEnum' => $this->TypeEnum->value
        ];
    }
}