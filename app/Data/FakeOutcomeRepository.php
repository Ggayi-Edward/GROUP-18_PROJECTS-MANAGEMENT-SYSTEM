<?php

namespace App\Data;

use App\Models\Outcome;

class FakeOutcomeRepository
{
    private static $file = __DIR__ . '/outcomes.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) return [];
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $outcomes): void
    {
        file_put_contents(self::$file, json_encode($outcomes, JSON_PRETTY_PRINT));
    }

    public static function all(): array
    {
        return array_map(fn($data) => Outcome::fromArray($data), self::load());
    }

    public static function find($id): ?Outcome
    {
        $rows = self::load();
        return isset($rows[$id]) ? Outcome::fromArray($rows[$id]) : null;
    }

    public static function create(array $data): Outcome
    {
        $rows = self::load();
        $id = empty($rows) ? 1 : max(array_keys($rows)) + 1;
        $data['OutcomeId'] = $id;
        $rows[$id] = $data;
        self::save($rows);
        return Outcome::fromArray($data);
    }

    public static function update($id, array $data): ?Outcome
    {
        $rows = self::load();
        if (!isset($rows[$id])) return null;
        $rows[$id] = array_merge($rows[$id], $data);
        self::save($rows);
        return Outcome::fromArray($rows[$id]);
    }

    public static function delete($id): void
    {
        $rows = self::load();
        unset($rows[$id]);
        self::save($rows);
    }

    public static function forProject($projectId): array
    {
        $rows = self::load();
        $filtered = array_filter($rows, fn($r) => isset($r['ProjectId']) && $r['ProjectId'] == $projectId);
        return array_map(fn($r) => Outcome::fromArray($r), $filtered);
    }
}
