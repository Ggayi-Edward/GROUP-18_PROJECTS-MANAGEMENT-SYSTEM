<?php

namespace App\Data;

use App\Models\Equipment;

class FakeEquipmentRepository
{
    private static $file = __DIR__ . '/equipment.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) {
            return [];
        }
        $json = file_get_contents(self::$file);
        $data = json_decode($json, true);
        return $data ?: [];
    }

    private static function save(array $rows): void
    {
        file_put_contents(self::$file, json_encode($rows, JSON_PRETTY_PRINT));
    }

    /** @return Equipment[] */
    public static function all(): array
    {
        $rows = self::load();
        return array_map(fn ($r) => Equipment::fromArray($r), $rows);
    }

    public static function find($id): ?Equipment
    {
        $rows = self::load();
        return isset($rows[$id]) ? Equipment::fromArray($rows[$id]) : null;
    }

    public static function create(array $data): Equipment
    {
        $rows = self::load();
        $id = empty($rows) ? 1 : max(array_keys($rows)) + 1;

        $data['EquipmentId'] = $id;
        $rows[$id] = $data;

        self::save($rows);
        return Equipment::fromArray($data);
    }

    public static function update($id, array $data): ?Equipment
    {
        $rows = self::load();
        if (!isset($rows[$id])) return null;

        $rows[$id] = array_merge($rows[$id], $data);
        self::save($rows);

        return Equipment::fromArray($rows[$id]);
    }

    public static function delete($id): void
    {
        $rows = self::load();
        unset($rows[$id]);
        self::save($rows);
    }

    /** @return Equipment[] */
    public static function forFacility($facilityId): array
    {
        $rows = self::load();
        $filtered = array_filter($rows, fn ($r) => ($r['FacilityId'] ?? null) == $facilityId);
        return array_map(fn ($r) => Equipment::fromArray($r), $filtered);
    }

    
}
