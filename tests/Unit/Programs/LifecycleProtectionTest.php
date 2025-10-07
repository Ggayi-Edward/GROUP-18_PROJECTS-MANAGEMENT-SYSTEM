<?php

namespace Tests\Unit\Programs;

use Tests\TestCase;
use App\Data\FakeProgramRepository;
use App\Data\FakeProjectRepository;
use Exception;

class LifecycleProtectionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        file_put_contents(base_path('app/Data/programs.json'), json_encode([]));
        file_put_contents(base_path('app/Data/projects.json'), json_encode([]));
    }

    /** @test */
    public function it_prevents_deletion_if_program_has_projects()
    {
        $program = FakeProgramRepository::create([
            'Name' => 'Smart Farming Program',
            'Description' => 'AgriTech development',
            'NationalAlignment' => '4IR'
        ]);

        // Create a project linked to this program
        FakeProjectRepository::create([
            'Name' => 'IoT Agriculture',
            'ProgramId' => $program->ProgramId
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Program has Projects; archive or reassign before delete.');

        FakeProgramRepository::delete($program->ProgramId);
    }

    /** @test */
    public function it_allows_deletion_when_no_projects_exist()
    {
        $program = FakeProgramRepository::create([
            'Name' => 'CleanTech Program',
            'Description' => 'Renewable energy R&D',
            'NationalAlignment' => 'DigitalRoadmap2023_2028'
        ]);

        FakeProgramRepository::delete($program->ProgramId);

        $this->assertNull(FakeProgramRepository::find($program->ProgramId));
    }
}
