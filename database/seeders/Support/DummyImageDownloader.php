<?php

namespace Database\Seeders\Support;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Downloads real image bytes from a free source and saves them into
 * storage/app/public/... using the same path/naming conventions your
 * app already uses (checked against your .sql dump).
 *
 * No manual downloading, no manual renaming — every call produces one
 * real file on disk and returns the relative path to store in the DB.
 */
class DummyImageDownloader
{
    /**
     * Download one property image into properties/featured or properties/gallery,
     * matching the pattern seen in your property_images table:
     * "properties/featured/{40-char-random}.jpg"
     */
    public static function propertyImage(string $type = 'gallery'): string
    {
        $folder = $type === 'featured' ? 'properties/featured' : 'properties/gallery';
        $filename = Str::random(40) . '.jpg';
        $path = "{$folder}/{$filename}";

        self::saveTo($path, "https://picsum.photos/seed/" . Str::random(8) . "/1200/800");

        return $path;
    }

    /**
     * Download one user avatar, matching the pattern seen in your users table:
     * "avatars/user_{id}_{timestamp}.jpg"
     */
    public static function userAvatar(int $userId): string
    {
        $filename = "user_{$userId}_" . now()->timestamp . '.jpg';
        $path = "avatars/{$filename}";

        // pravatar.cc serves real face photos, deterministic per seed (?u=)
        self::saveTo($path, "https://i.pravatar.cc/400?u=user{$userId}");

        return $path;
    }

    /**
     * Fetch bytes from $url and store them on the public disk at $path.
     * Falls back to leaving no file (caller keeps the path anyway) if the
     * request fails, so seeding never crashes on a flaky network call.
     */
    protected static function saveTo(string $path, string $url): void
    {
        try {
            $response = Http::timeout(15)->withOptions(['allow_redirects' => true])->get($url);

            if ($response->successful() && strlen($response->body()) > 0) {
                Storage::disk('public')->put($path, $response->body());
            } else {
                Log::warning("DummyImageDownloader: non-success response for {$url}");
            }
        } catch (\Throwable $e) {
            Log::warning("DummyImageDownloader failed for {$url}: " . $e->getMessage());
        }
    }
}
