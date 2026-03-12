<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class SupabaseStorage
{
    /**
     * Upload a file to Supabase Storage.
     *
     * @param UploadedFile $file The uploaded file
     * @param string $folder The folder path inside the bucket (e.g., 'settings', 'profil')
     * @param string|null $filename Custom filename (optional)
     * @return string The public URL of the uploaded file
     */
    public static function upload(UploadedFile $file, string $folder, ?string $filename = null): string
    {
        $supabaseUrl = config('services.supabase.url');
        $supabaseKey = config('services.supabase.service_key');
        $bucket = config('services.supabase.bucket', 'uploads');

        // Generate filename if not provided
        if (!$filename) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        }

        $path = $folder . '/' . $filename;

        // Upload via Supabase Storage REST API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $supabaseKey,
            'Content-Type' => $file->getMimeType(),
        ])->withBody(
            file_get_contents($file->getRealPath()),
            $file->getMimeType()
        )->post("{$supabaseUrl}/storage/v1/object/{$bucket}/{$path}");

        if ($response->failed()) {
            // If file exists, try upsert
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $supabaseKey,
                'Content-Type' => $file->getMimeType(),
                'x-upsert' => 'true',
            ])->withBody(
                file_get_contents($file->getRealPath()),
                $file->getMimeType()
            )->post("{$supabaseUrl}/storage/v1/object/{$bucket}/{$path}");
        }

        if ($response->successful()) {
            return self::getPublicUrl($path);
        }

        throw new \RuntimeException('Failed to upload file to Supabase Storage: ' . $response->body());
    }

    /**
     * Get the public URL of a file in Supabase Storage.
     *
     * @param string $path The file path (e.g., 'settings/image.jpg')
     * @return string The full public URL
     */
    public static function getPublicUrl(string $path): string
    {
        $supabaseUrl = config('services.supabase.url');
        $bucket = config('services.supabase.bucket', 'uploads');

        return "{$supabaseUrl}/storage/v1/object/public/{$bucket}/{$path}";
    }

    /**
     * Delete a file from Supabase Storage.
     *
     * @param string $path The file path to delete
     * @return bool
     */
    public static function delete(string $path): bool
    {
        $supabaseUrl = config('services.supabase.url');
        $supabaseKey = config('services.supabase.service_key');
        $bucket = config('services.supabase.bucket', 'uploads');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $supabaseKey,
        ])->delete("{$supabaseUrl}/storage/v1/object/{$bucket}/{$path}");

        return $response->successful();
    }

    /**
     * Check if a given path is a Supabase URL (vs local path).
     *
     * @param string|null $path
     * @return bool
     */
    public static function isSupabaseUrl(?string $path): bool
    {
        if (!$path) return false;
        return str_contains($path, 'supabase.co/storage');
    }
}
