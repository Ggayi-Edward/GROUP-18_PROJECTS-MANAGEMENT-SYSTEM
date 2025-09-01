<?php

namespace App\Data;

use App\Models\Facility;

class FakeFacilityRepository
{
    private static $file = __DIR__ . '/facilities.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) {
            return [];
        }
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $facilities): void
    {
        file_put_contents(self::$file, json_encode($facilities, JSON_PRETTY_PRINT));
    }

    public static function all(): array
    {
        $facilities = self::load();
        return array_map(fn($data) => Facility::fromArray($data), $facilities);
    }

    public static function find($id): ?Facility
    {
        $facilities = self::load();
        return isset($facilities[$id]) ? Facility::fromArray($facilities[$id]) : null;
    }

    public static function create(array $data): Facility
    {
        $facilities = self::load();
        $id = empty($facilities) ? 1 : max(array_keys($facilities)) + 1;
        $data['FacilityId'] = $id;
        $facilities[$id] = $data;
        self::save($facilities);
        return Facility::fromArray($data);
    }

    public static function update($id, array $data): ?Facility
    {
        $facilities = self::load();
        if (!isset($facilities[$id])) return null;
        $facilities[$id] = array_merge($facilities[$id], $data);
        self::save($facilities);
        return Facility::fromArray($facilities[$id]);
    }

    public static function delete($id): void
    {
        $facilities = self::load();
        unset($facilities[$id]);
        self::save($facilities);
    }
}
