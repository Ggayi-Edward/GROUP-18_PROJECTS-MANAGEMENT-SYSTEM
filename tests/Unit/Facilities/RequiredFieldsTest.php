<?php

namespace Tests\Unit\Facilities;

use Tests\TestCase;
use App\Data\FakeFacilityRepository;
use Exception;

class RequiredFieldsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeFacilityRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_requires_name_location_and_type_when_creating_facility()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Facility.Name, Facility.Location, and Facility.FacilityType are required.");

        FakeFacilityRepository::create([
            'Name' => '',
            'Location' => 'Kampala',
            'FacilityType' => ''
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_creates_facility_successfully_with_required_fields()
    {
        $facility = FakeFacilityRepository::create([
            'Name' => 'TechHub',
            'Location' => 'Kampala',
            'FacilityType' => 'Innovation Center'
        ]);

        $this->assertEquals('TechHub', $facility->Name);
        $this->assertEquals('Kampala', $facility->Location);
        $this->assertEquals('Innovation Center', $facility->FacilityType);
    }
}
