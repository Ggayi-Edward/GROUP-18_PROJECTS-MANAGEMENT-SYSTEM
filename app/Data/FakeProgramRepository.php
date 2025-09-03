<?php

namespace App\Data;

use App\Models\Program;

class FakeProgramRepository
{
    private static $file = __DIR__ . '/programs.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) {
            return [];
        }
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $rows): void
    {
        file_put_contents(self::$file, json_encode($rows, JSON_PRETTY_PRINT));
    }

    /** @return Program[] */
    public static function all(): array
    {
        $rows = self::load();
        return array_map(fn($r) => Program::fromArray($r), $rows);
    }

    public static function find($id): ?Program
    {
        $rows = self::load();
        return isset($rows[$id]) ? Program::fromArray($rows[$id]) : null;
    }

    public static function create(array $data): Program
    {
        $rows = self::load();
        $id = empty($rows) ? 1 : max(array_keys($rows)) + 1;
        $data['ProgramId'] = $id;

        // normalize arrays if passed as comma-separated strings
        if (isset($data['FocusAreas']) && is_string($data['FocusAreas'])) {
            $data['FocusAreas'] = array_filter(array_map('trim', explode(',', $data['FocusAreas'])));
        }
        if (isset($data['Phases']) && is_string($data['Phases'])) {
            $data['Phases'] = array_filter(array_map('trim', explode(',', $data['Phases'])));
        }

        $rows[$id] = $data;
        self::save($rows);
        return Program::fromArray($data);
    }

    public static function update($id, array $data): ?Program
    {
        $rows = self::load();
        if (!isset($rows[$id])) return null;

        if (isset($data['FocusAreas']) && is_string($data['FocusAreas'])) {
            $data['FocusAreas'] = array_filter(array_map('trim', explode(',', $data['FocusAreas'])));
        }
        if (isset($data['Phases']) && is_string($data['Phases'])) {
            $data['Phases'] = array_filter(array_map('trim', explode(',', $data['Phases'])));
        }

        $rows[$id] = array_merge($rows[$id], $data);
        self::save($rows);
        return Program::fromArray($rows[$id]);
    }

    public static function delete($id): void
    {
        $rows = self::load();
        unset($rows[$id]);
        self::save($rows);
    }

    /**
     * Return projects belonging to this program
     * Uses FakeProjectRepository::forProgram($programId)
     * @return array of Project arrays or Project objects depending on Project repo implementation
     */
    public static function projects($programId): array
    {
        // keep loose coupling: call FakeProjectRepository if it exists
        if (class_exists(\App\Data\FakeProjectRepository::class)) {
            return \App\Data\FakeProjectRepository::forProgram($programId);
        }
        return [];
    }
}
