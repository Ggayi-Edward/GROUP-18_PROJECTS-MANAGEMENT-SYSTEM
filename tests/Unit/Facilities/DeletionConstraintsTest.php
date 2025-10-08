<?php

namespace Tests\Unit\Facilities;

use Tests\TestCase;
use App\Data\FakeFacilityRepository;
use Exception;

class DeletionConstraintsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        FakeFacilityRepository::reset();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_prevents_deletion_if_facility_has_dependent_records()
    {
        $facility = FakeFacilityRepository::create([
            'Name' => 'Makerere Tech Park',
            'Location' => 'Kampala',
            'FacilityType' => 'Tech Park'
        ]);

        FakeFacilityRepository::setFakeDependencies([
            'services' => [
                ['ServiceId' => 1, 'FacilityId' => $facility->FacilityId]
            ]
        ]);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Facility has dependent records (Services/Equipment/Projects).");

        FakeFacilityRepository::delete($facility->FacilityId);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_allows_deletion_if_no_related_records_exist()
    {
        $facility = FakeFacilityRepository::create([
            'Name' => 'UIRI Workshop',
            'Location' => 'Nakawa',
            'FacilityType' => 'Workshop'
        ]);

        FakeFacilityRepository::setFakeDependencies([
            'services' => [],
            'equipment' => [],
            'projects' => []
        ]);

        FakeFacilityRepository::delete($facility->FacilityId);
        $this->assertNull(FakeFacilityRepository::find($facility->FacilityId));
    }
}
