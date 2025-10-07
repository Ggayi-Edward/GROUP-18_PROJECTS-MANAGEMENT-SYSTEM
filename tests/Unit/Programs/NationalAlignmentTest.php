<?php

namespace Tests\Unit\Programs;

use Tests\TestCase;
use App\Data\FakeProgramRepository;
use Exception;

class NationalAlignmentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        file_put_contents(base_path('app/Data/programs.json'), json_encode([]));
    }

    /** @test */
    public function it_requires_valid_alignment_if_focus_areas_are_defined()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage(
            'Program.NationalAlignment must include at least one recognized alignment when FocusAreas are specified.'
        );

        FakeProgramRepository::create([
            'Name' => 'AI Development Program',
            'Description' => 'Focuses on AI and ML',
            'FocusAreas' => 'AI, ML',
            'NationalAlignment' => 'RandomPolicy' // invalid token
        ]);
    }

    /** @test */
    public function it_accepts_valid_alignment_tokens_when_focus_areas_exist()
    {
        $program = FakeProgramRepository::create([
            'Name' => 'Automation Program',
            'Description' => 'Focus on robotics',
            'FocusAreas' => 'Robotics',
            'NationalAlignment' => 'NDPIII'
        ]);

        $this->assertEquals('NDPIII', $program->NationalAlignment);
    }
}
