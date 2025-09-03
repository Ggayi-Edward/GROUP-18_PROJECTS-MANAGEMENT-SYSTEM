<?php

namespace App\Models;

class Project
{
    public $ProjectId;
    public $Name;
    public $Description;
    public $StartDate;
    public $EndDate;
    public $Status;
    public $ProgramId;
    public $FacilityId;
    public $Participants = [];
    public $Outcomes = [];

    public static function fromArray(array $data): self
    {
        $project = new self();
        $project->ProjectId    = $data['ProjectId'] ?? null;
        $project->Name         = $data['Name'] ?? '';
        $project->Description  = $data['Description'] ?? '';
        $project->StartDate    = $data['StartDate'] ?? null;
        $project->EndDate      = $data['EndDate'] ?? null;
        $project->Status       = $data['Status'] ?? 'Planned';
        $project->ProgramId    = $data['ProgramId'] ?? null;
        $project->FacilityId   = $data['FacilityId'] ?? null;
        $project->Participants = $data['Participants'] ?? [];
        $project->Outcomes     = $data['Outcomes'] ?? [];
        return $project;
    }

    public function toArray(): array
    {
        return [
            'ProjectId'    => $this->ProjectId,
            'Name'         => $this->Name,
            'Description'  => $this->Description,
            'StartDate'    => $this->StartDate,
            'EndDate'      => $this->EndDate,
            'Status'       => $this->Status,
            'ProgramId'    => $this->ProgramId,
            'FacilityId'   => $this->FacilityId,
            'Participants' => $this->Participants,
            'Outcomes'     => $this->Outcomes,
        ];
    }
}
