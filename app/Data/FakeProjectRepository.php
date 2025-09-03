<?php

namespace App\Data;

use App\Models\Project;

class FakeProjectRepository
{
    private static $file = __DIR__ . '/projects.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) return [];
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $projects): void
    {
        file_put_contents(self::$file, json_encode($projects, JSON_PRETTY_PRINT));
    }

    /** @return Project[] */
    public static function all(): array
    {
        return array_map(fn($data) => Project::fromArray($data), self::load());
    }

    public static function find($id): ?Project
    {
        $projects = self::load();
        return isset($projects[$id]) ? Project::fromArray($projects[$id]) : null;
    }

    public static function create(array $data): Project
    {
        $projects = self::load();
        $id = empty($projects) ? 1 : max(array_keys($projects)) + 1;
        $data['ProjectId'] = $id;
        $projects[$id] = $data;
        self::save($projects);
        return Project::fromArray($data);
    }

    public static function update($id, array $data): ?Project
    {
        $projects = self::load();
        if (!isset($projects[$id])) return null;
        $projects[$id] = array_merge($projects[$id], $data);
        self::save($projects);
        return Project::fromArray($projects[$id]);
    }

    public static function delete($id): void
    {
        $projects = self::load();
        unset($projects[$id]);
        self::save($projects);
    }

    /** Get all projects under a given Program */
    public static function forProgram($programId): array
    {
        $rows = self::load();
        $filtered = array_filter($rows, fn($r) => isset($r['ProgramId']) && $r['ProgramId'] == $programId);

        return array_map(fn($r) => Project::fromArray($r), $filtered);
    }

    /** Get all projects under a given Facility */
    public static function forFacility($facilityId): array
    {
        $rows = self::load();
        $filtered = array_filter($rows, fn($r) => isset($r['FacilityId']) && $r['FacilityId'] == $facilityId);

        return array_map(fn($r) => Project::fromArray($r), $filtered);
    }

    
}
