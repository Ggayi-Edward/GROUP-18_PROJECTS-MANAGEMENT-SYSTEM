<?php

namespace Tests\Unit\Facilities;

use Tests\TestCase;
use App\Data\FakeFacilityRepository;
use Exception;

class CapabilitiesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeFacilityRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_requires_capabilities_when_services_or_equipment_exist()
    {
        $facility = [
            'Name' => 'CEDAT Facility',
            'Location' => 'Kampala',
            'FacilityType' => 'Engineering Lab',
            'Services' => ['Calibration'],
            'Capabilities' => [] // empty
        ];

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Facility.Capabilities must be populated when Services/Equipment exist.");

        FakeFacilityRepository::validateCapabilities($facility);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_allows_missing_capabilities_if_no_services_or_equipment_exist()
    {
        $facility = [
            'Name' => 'CEDAT Facility',
            'Location' => 'Kampala',
            'FacilityType' => 'Engineering Lab',
            'Services' => [],
            'Equipment' => [],
            'Capabilities' => []
        ];

        $result = FakeFacilityRepository::validateCapabilities($facility);
        $this->assertTrue($result);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_accepts_capabilities_when_services_exist()
    {
        $facility = [
            'Name' => 'Innovation Center',
            'Location' => 'Namanve',
            'FacilityType' => 'Industrial Lab',
            'Services' => ['Testing'],
            'Equipment' => [],
            'Capabilities' => ['3D Printing', 'CAD Design']
        ];

        $result = FakeFacilityRepository::validateCapabilities($facility);
        $this->assertTrue($result);
    }
}
