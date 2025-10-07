<?php

namespace Tests\Unit\Programs;

use Tests\TestCase;
use App\Data\FakeProgramRepository;
use Exception;

class RequiredFieldsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // clear fake data
        file_put_contents(base_path('app/Data/programs.json'), json_encode([]));
    }

    /** @test */
    public function it_requires_name_and_description_when_creating_program()
    {
        $this->expectException(Exception::class);

        FakeProgramRepository::create([
            'NationalAlignment' => 'NDPIII',
            'FocusAreas' => 'AI, IoT'
        ]);
    }

    /** @test */
    public function it_creates_program_successfully_with_required_fields()
    {
        $program = FakeProgramRepository::create([
            'Name' => 'Green Energy Program',
            'Description' => 'Focus on renewable technologies',
            'NationalAlignment' => '4IR'
        ]);

        $this->assertEquals('Green Energy Program', $program->Name);
        $this->assertEquals('Focus on renewable technologies', $program->Description);
    }
}
