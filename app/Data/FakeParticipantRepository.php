<?php

namespace App\Data;

use App\Models\Participant;

class FakeParticipantRepository
{
    private static $file = __DIR__ . '/participants.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) {
            return [];
        }
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $participants): void
    {
        file_put_contents(self::$file, json_encode($participants, JSON_PRETTY_PRINT));
    }

    /** @return Participant[] */
    public static function all(): array
    {
        return array_map(fn($data) => Participant::fromArray($data), self::load());
    }

    public static function find($id): ?Participant
    {
        $rows = self::load();
        return isset($rows[$id]) ? Participant::fromArray($rows[$id]) : null;
    }

    public static function create(array $data): Participant
    {
        $rows = self::load();
        $id = empty($rows) ? 1 : max(array_keys($rows)) + 1;
        $data['ParticipantId'] = $id;
        $rows[$id] = $data;
        self::save($rows);
        return Participant::fromArray($data);
    }

    public static function update($id, array $data): ?Participant
    {
        $rows = self::load();
        if (!isset($rows[$id])) return null;
        $rows[$id] = array_merge($rows[$id], $data);
        self::save($rows);
        return Participant::fromArray($rows[$id]);
    }

    public static function delete($id): void
    {
        $rows = self::load();
        unset($rows[$id]);
        self::save($rows);
    }
}
