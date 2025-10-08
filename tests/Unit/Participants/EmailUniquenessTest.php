<?php

namespace Tests\Unit\Participants;

use Tests\TestCase;
use App\Data\FakeParticipantRepository;
use Exception;

class EmailUniquenessTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeParticipantRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_prevents_duplicate_email_addresses_case_insensitive()
    {
        FakeParticipantRepository::create([
            'FullName' => 'John Doe',
            'Email' => 'john@example.com',
            'Affiliation' => 'SCIT',
            'Specialization' => 'Software Engineering',
            'CrossSkillTrained' => false,
            'Institution' => 'Makerere'
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Participant.Email already exists.");

        FakeParticipantRepository::create([
            'FullName' => 'Johnny Doe',
            'Email' => 'JOHN@example.com', // same email, different case
            'Affiliation' => 'CEDAT',
            'Specialization' => 'AI',
            'CrossSkillTrained' => false,
            'Institution' => 'UIRI'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_allows_different_emails()
    {
        $p1 = FakeParticipantRepository::create([
            'FullName' => 'Alice',
            'Email' => 'alice@example.com',
            'Affiliation' => 'CEDAT',
            'Specialization' => 'Networking',
            'CrossSkillTrained' => false,
            'Institution' => 'UIRI'
        ]);

        $p2 = FakeParticipantRepository::create([
            'FullName' => 'Bob',
            'Email' => 'bob@example.com',
            'Affiliation' => 'SCIT',
            'Specialization' => 'Cybersecurity',
            'CrossSkillTrained' => true,
            'Institution' => 'UniPod'
        ]);

        $this->assertNotEquals($p1->Email, $p2->Email);
    }
}
