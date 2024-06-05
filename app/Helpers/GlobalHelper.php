<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists("getFileUrl")) {
    /**
     * @param object|array|string $file file object or array
     * @return string|null file path
     */
    function getFileUrl(mixed $file): ?string
    {
        if (is_object($file) && isset($file->location)) {
            return Storage::url($file->location);
        } elseif (is_array($file) && isset($file['location'])) {
            return Storage::url($file['location']);
        } elseif (is_string($file)) {
            return Storage::url($file);
        }
        return null;
    }
}
