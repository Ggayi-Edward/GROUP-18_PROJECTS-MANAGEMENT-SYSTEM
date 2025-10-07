<?php

namespace App\Models;

class Equipment
{
    public $EquipmentId;
    public $FacilityId;
    public $Name;
    public $Capabilities;   // plural
    public $Description;
    public $InventoryCode;
    public $UsageDomain;
    public $SupportPhase;

    /**
     * Hydrate an Equipment object from array data
     */
    public static function fromArray(array $data): self
    {
        $eq = new self();
        $eq->EquipmentId   = $data['EquipmentId']   ?? null;
        $eq->FacilityId    = $data['FacilityId']    ?? null;
        $eq->Name          = $data['Name']          ?? '';
        $eq->Capabilities  = $data['Capabilities']  ?? '';
        $eq->Description   = $data['Description']   ?? '';
        $eq->InventoryCode = $data['InventoryCode'] ?? '';
        $eq->UsageDomain   = $data['UsageDomain']   ?? '';
        $eq->SupportPhase  = $data['SupportPhase']  ?? '';
        return $eq;
    }

    /**
     * Convert the Equipment object back to an array
     */
    public function toArray(): array
    {
        return [
            'EquipmentId'   => $this->EquipmentId,
            'FacilityId'    => $this->FacilityId,
            'Name'          => $this->Name,
            'Capabilities'  => $this->Capabilities,
            'Description'   => $this->Description,
            'InventoryCode' => $this->InventoryCode,
            'UsageDomain'   => $this->UsageDomain,
            'SupportPhase'  => $this->SupportPhase,
        ];
    }
}
