<?php

namespace Tests\Unit\Programs;

use Tests\TestCase;
use App\Data\FakeProgramRepository;
use Exception;

class UniquenessTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        file_put_contents(base_path('app/Data/programs.json'), json_encode([]));
    }

    /** @test */
    public function it_prevents_duplicate_program_names_case_insensitive()
    {
        FakeProgramRepository::create([
            'Name' => 'Digital Uganda Vision',
            'Description' => 'A national strategy initiative',
            'NationalAlignment' => 'NDPIII'
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Program.Name already exists.');

        // should throw because of case-insensitive duplicate
        FakeProgramRepository::create([
            'Name' => 'digital uganda vision',
            'Description' => 'duplicate case variant',
            'NationalAlignment' => 'NDPIII'
        ]);
    }
}
