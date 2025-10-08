<?php

namespace Tests\Unit\Facilities;

use Tests\TestCase;
use App\Data\FakeFacilityRepository;
use Exception;

class UniquenessTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeFacilityRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_prevents_duplicate_facilities_with_same_name_and_location()
    {
        FakeFacilityRepository::create([
            'Name' => 'Innovation Lab',
            'Location' => 'Nairobi',
            'FacilityType' => 'Research Center'
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("A facility with this name already exists at this location.");

        FakeFacilityRepository::create([
            'Name' => 'Innovation Lab',
            'Location' => 'Nairobi',
            'FacilityType' => 'Research Center'
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_allows_same_name_in_different_locations()
    {
        $f1 = FakeFacilityRepository::create([
            'Name' => 'Innovation Lab',
            'Location' => 'Nairobi',
            'FacilityType' => 'Research Center'
        ]);

        $f2 = FakeFacilityRepository::create([
            'Name' => 'Innovation Lab',
            'Location' => 'Kampala',
            'FacilityType' => 'Tech Hub'
        ]);

        $this->assertNotEquals($f1->Location, $f2->Location);
    }
}
