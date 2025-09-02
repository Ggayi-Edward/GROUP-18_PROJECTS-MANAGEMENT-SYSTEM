<?php

namespace App\Data;

use App\Models\Participant;

class FakeParticipantRepository
{
    private static $file = __DIR__ . '/participants.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) return [];
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $participants): void
    {
        file_put_contents(self::$file, json_encode($participants, JSON_PRETTY_PRINT));
    }

    public static function all(): array
    {
        return array_map(fn($data) => Participant::fromArray($data), self::load());
    }

    public static function find($id): ?Participant
    {
        $participants = self::load();
        return isset($participants[$id]) ? Participant::fromArray($participants[$id]) : null;
    }

    public static function create(array $data): Participant
    {
        $participants = self::load();
        $id = empty($participants) ? 1 : max(array_keys($participants)) + 1;
        $data['ParticipantId'] = $id;
        $participants[$id] = $data;
        self::save($participants);
        return Participant::fromArray($data);
    }

    public static function update($id, array $data): ?Participant
    {
        $participants = self::load();
        if (!isset($participants[$id])) return null;
        $participants[$id] = array_merge($participants[$id], $data);
        self::save($participants);
        return Participant::fromArray($participants[$id]);
    }

    public static function delete($id): void
    {
        $participants = self::load();
        unset($participants[$id]);
        self::save($participants);
    }
}
