<?php

namespace App\Models;

class Outcome
{
    public $OutcomeId;
    public $Title;
    public $Description;
    public $ArtifactLink;
    public $ProjectId;

    public static function fromArray(array $data): self
    {
        $outcome = new self();
        $outcome->OutcomeId   = $data['OutcomeId'] ?? null;
        $outcome->Title       = $data['Title'] ?? '';
        $outcome->Description = $data['Description'] ?? '';
        $outcome->ArtifactLink= $data['ArtifactLink'] ?? '';
        $outcome->ProjectId   = $data['ProjectId'] ?? null;
        return $outcome;
    }

    public function toArray(): array
    {
        return [
            'OutcomeId'   => $this->OutcomeId,
            'Title'       => $this->Title,
            'Description' => $this->Description,
            'ArtifactLink'=> $this->ArtifactLink,
            'ProjectId'   => $this->ProjectId,
        ];
    }
}
