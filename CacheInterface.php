<?php
namespace Colibri\Cache;

/**
 * Cache interface.
 */
interface CacheInterface
{
    /**
     * @param string $key for data
     *
     * @return mixed Returns cached data.
     */
    public static function get(string $key);

    /**
     * @param string   $key    key for data
     * @param mixed    $value  any type of supported data: object, string, int…
     * @param int|null $expire seconds
     *
     * @return bool True on success and false on failure.
     */
    public static function set(string $key, $value, int $expire = null): bool;

    /**
     * @param string $key key for data
     *
     * @return bool True on success and false on failure.
     */
    public static function delete(string $key): bool;

    /**
     * Tries to ::get() data from cache; and if not exists,
     *   get the real date through $getValueCallback()
     *   and store it in cache, than return.
     *
     * @param string   $key              key for data
     * @param \Closure $getValueCallback closure that get the real (not cached) value
     * @param int|null $expire           seconds
     *
     * @return mixed Returns cached data
     */
    public static function remember(string $key, \Closure $getValueCallback, int $expire = null);
}
