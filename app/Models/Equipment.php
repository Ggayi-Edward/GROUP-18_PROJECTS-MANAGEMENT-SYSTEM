<?php

namespace App\Models;

class Equipment
{
    public $EquipmentId;
    public $FacilityId;
    public $Name;
    public $Description;
    public $Capability; // singular field

    /**
     * Hydrate an Equipment object from array data
     */
    public static function fromArray(array $data): self
    {
        $eq = new self();
        $eq->EquipmentId = $data['EquipmentId'] ?? null;
        $eq->FacilityId  = $data['FacilityId'] ?? null;
        $eq->Name        = $data['Name'] ?? '';
        $eq->Description = $data['Description'] ?? '';
        $eq->Capability  = $data['Capability'] ?? ''; // keep singular
        return $eq;
    }

    /**
     * Convert the Equipment object back to an array
     */
    public function toArray(): array
    {
        return [
            'EquipmentId' => $this->EquipmentId,
            'FacilityId'  => $this->FacilityId,
            'Name'        => $this->Name,
            'Description' => $this->Description,
            'Capability'  => $this->Capability,
        ];
    }
}
