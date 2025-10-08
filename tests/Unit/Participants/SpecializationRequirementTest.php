<?php

namespace Tests\Unit\Participants;

use Tests\TestCase;
use App\Data\FakeParticipantRepository;
use Exception;

class SpecializationRequirementTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeParticipantRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_requires_specialization_when_cross_skill_trained_is_true()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Cross-skill flag requires Specialization.");

        FakeParticipantRepository::create([
            'FullName' => 'Peter Okello',
            'Email' => 'peter@uni.ac.ug',
            'Affiliation' => 'CEDAT',
            'Specialization' => '',
            'CrossSkillTrained' => true,
            'Institution' => 'Makerere'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_allows_cross_skill_false_even_without_specialization()
    {
        $participant = FakeParticipantRepository::create([
            'FullName' => 'Sarah N.',
            'Email' => 'sarah@uni.ac.ug',
            'Affiliation' => 'SCIT',
            'Specialization' => '',
            'CrossSkillTrained' => false,
            'Institution' => 'UniPod'
        ]);

        $this->assertFalse($participant->CrossSkillTrained);
        $this->assertEmpty($participant->Specialization);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_allows_cross_skill_true_with_valid_specialization()
    {
        $participant = FakeParticipantRepository::create([
            'FullName' => 'Michael K.',
            'Email' => 'michael@uni.ac.ug',
            'Affiliation' => 'CEDAT',
            'Specialization' => 'Mechanical Engineering',
            'CrossSkillTrained' => true,
            'Institution' => 'Makerere'
        ]);

        $this->assertTrue($participant->CrossSkillTrained);
        $this->assertEquals('Mechanical Engineering', $participant->Specialization);
    }
}
