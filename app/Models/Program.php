<?php

namespace App\Models;

class Program
{
    public $ProgramId;
    public $Name;
    public $Description;
    public $NationalAlignment;
    public $FocusAreas = [];
    public $Phases = [];

    public static function fromArray(array $data): self
    {
        $program = new self();
        $program->ProgramId = $data['ProgramId'] ?? null;
        $program->Name = $data['Name'] ?? '';
        $program->Description = $data['Description'] ?? '';
        $program->NationalAlignment = $data['NationalAlignment'] ?? '';
        $program->FocusAreas = $data['FocusAreas'] ?? [];
        $program->Phases = $data['Phases'] ?? [];
        return $program;
    }

    public function toArray(): array
    {
        return [
            'ProgramId' => $this->ProgramId,
            'Name' => $this->Name,
            'Description' => $this->Description,
            'NationalAlignment' => $this->NationalAlignment,
            'FocusAreas' => $this->FocusAreas,
            'Phases' => $this->Phases,
        ];
    }
}
