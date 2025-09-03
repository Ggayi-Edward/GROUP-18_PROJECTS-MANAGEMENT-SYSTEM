<?php

namespace App\Models;

class Equipment
{
    public $EquipmentId;
    public $Name;
    public $Description;
    public $Capability;
    public $FacilityId;

    public static function fromArray(array $data): self
    {
        $e = new self();
        $e->EquipmentId = $data['EquipmentId'] ?? null;
        $e->Name        = $data['Name']        ?? '';
        $e->Description = $data['Description'] ?? '';
        $e->Capability  = $data['Capability']  ?? '';
        $e->FacilityId  = $data['FacilityId']  ?? null;
        return $e;
    }

    public function toArray(): array
    {
        return [
            'EquipmentId' => $this->EquipmentId,
            'Name'        => $this->Name,
            'Description' => $this->Description,
            'Capability'  => $this->Capability,
            'FacilityId'  => $this->FacilityId,
        ];
    }
}
