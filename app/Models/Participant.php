<?php

namespace App\Models;

class Participant
{
    public $ParticipantId;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Phone;
    public $Role; // e.g., Student, Mentor, Coordinator
    public $Affiliation; // e.g., University, Industry Partner

    public static function fromArray(array $data): self
    {
        $participant = new self();
        $participant->ParticipantId = $data['ParticipantId'] ?? null;
        $participant->FirstName = $data['FirstName'] ?? '';
        $participant->LastName = $data['LastName'] ?? '';
        $participant->Email = $data['Email'] ?? '';
        $participant->Phone = $data['Phone'] ?? '';
        $participant->Role = $data['Role'] ?? '';
        $participant->Affiliation = $data['Affiliation'] ?? '';
        return $participant;
    }

    public function toArray(): array
    {
        return [
            'ParticipantId' => $this->ParticipantId,
            'FirstName' => $this->FirstName,
            'LastName' => $this->LastName,
            'Email' => $this->Email,
            'Phone' => $this->Phone,
            'Role' => $this->Role,
            'Affiliation' => $this->Affiliation,
        ];
    }
}
