<?php

if (!function_exists('upload_url')) {
    /**
     * Generate a URL for uploaded files.
     * If the path is already a full URL (Supabase), return it as-is.
     * Otherwise, use asset() for local files.
     *
     * @param string|null $path
     * @return string|null
     */
    function upload_url(?string $path): ?string
    {
        if (!$path) return null;

        // If it's already a full URL (Supabase Storage), return as-is
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Otherwise, use asset() for local files
        return asset($path);
    }
}
