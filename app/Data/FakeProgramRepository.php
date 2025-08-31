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

    private static function save(array $programs): void
    {
        file_put_contents(self::$file, json_encode($programs, JSON_PRETTY_PRINT));
    }

    public static function all(): array
    {
        $programs = self::load();
        return array_map(fn($data) => Program::fromArray($data), $programs);
    }

    public static function find($id): ?Program
    {
        $programs = self::load();
        return isset($programs[$id]) ? Program::fromArray($programs[$id]) : null;
    }

    public static function create(array $data): Program
    {
        $programs = self::load();
        $id = empty($programs) ? 1 : max(array_keys($programs)) + 1;
        $data['ProgramId'] = $id;
        $programs[$id] = $data;
        self::save($programs);
        return Program::fromArray($data);
    }

    public static function update($id, array $data): ?Program
    {
        $programs = self::load();
        if (!isset($programs[$id])) return null;
        $programs[$id] = array_merge($programs[$id], $data);
        self::save($programs);
        return Program::fromArray($programs[$id]);
    }

    public static function delete($id): void
    {
        $programs = self::load();
        unset($programs[$id]);
        self::save($programs);
    }
}
