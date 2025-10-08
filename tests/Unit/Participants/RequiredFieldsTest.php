<?php

namespace Tests\Unit\Participants;

use Tests\TestCase;
use App\Data\FakeParticipantRepository;
use Exception;

class RequiredFieldsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeParticipantRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_requires_fullname_email_and_affiliation()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Participant.FullName, Participant.Email, and Participant.Affiliation are required.");

        FakeParticipantRepository::create([
            'FullName' => '',
            'Email' => '',
            'Affiliation' => '',
            'Specialization' => 'Software',
            'CrossSkillTrained' => false,
            'Institution' => 'CEDAT'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_creates_participant_when_required_fields_are_provided()
    {
        $participant = FakeParticipantRepository::create([
            'FullName' => 'Margaret Galloway',
            'Email' => 'margaret@example.com',
            'Affiliation' => 'CEDAT',
            'Specialization' => 'Computer Science',
            'CrossSkillTrained' => false,
            'Institution' => 'Makerere'
        ]);

        $this->assertEquals('Margaret Galloway', $participant->FullName);
        $this->assertEquals('margaret@example.com', $participant->Email);
        $this->assertEquals('CEDAT', $participant->Affiliation);
    }
}
