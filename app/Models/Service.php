<?php

namespace App\Models;

class Service
{
    public $ServiceId;
    public $Name;
    public $Description;
    public $Category;
    public $DeliveryMode;
    public $TargetGroups = [];

    public static function fromArray(array $data): self
    {
        $service = new self();
        $service->ServiceId = $data['ServiceId'] ?? null;
        $service->Name = $data['Name'] ?? '';
        $service->Description = $data['Description'] ?? '';
        $service->Category = $data['Category'] ?? '';
        $service->DeliveryMode = $data['DeliveryMode'] ?? '';
        $service->TargetGroups = $data['TargetGroups'] ?? [];
        return $service;
    }

    public function toArray(): array
    {
        return [
            'ServiceId' => $this->ServiceId,
            'Name' => $this->Name,
            'Description' => $this->Description,
            'Category' => $this->Category,
            'DeliveryMode' => $this->DeliveryMode,
            'TargetGroups' => $this->TargetGroups,
        ];
    }
}
