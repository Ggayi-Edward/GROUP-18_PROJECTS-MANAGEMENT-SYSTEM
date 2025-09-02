<?php

namespace App\Data;

use App\Models\Service;

class FakeServiceRepository
{
    private static $file = __DIR__ . '/services.json';

    private static function load(): array
    {
        if (!file_exists(self::$file)) {
            return [];
        }
        $data = json_decode(file_get_contents(self::$file), true);
        return $data ?: [];
    }

    private static function save(array $services): void
    {
        file_put_contents(self::$file, json_encode($services, JSON_PRETTY_PRINT));
    }

    public static function all(): array
    {
        $services = self::load();
        return array_map(fn($data) => Service::fromArray($data), $services);
    }

    public static function find($id): ?Service
    {
        $services = self::load();
        return isset($services[$id]) ? Service::fromArray($services[$id]) : null;
    }

    public static function create(array $data): Service
    {
        $services = self::load();
        $id = empty($services) ? 1 : max(array_keys($services)) + 1;
        $data['ServiceId'] = $id;
        $services[$id] = $data;
        self::save($services);
        return Service::fromArray($data);
    }

    public static function update($id, array $data): ?Service
    {
        $services = self::load();
        if (!isset($services[$id])) return null;
        $services[$id] = array_merge($services[$id], $data);
        self::save($services);
        return Service::fromArray($services[$id]);
    }

    public static function delete($id): void
    {
        $services = self::load();
        unset($services[$id]);
        self::save($services);
    }
}
