<?php

if (! function_exists('assets_url')) {
    /**
     * Generate the URL to assets path
     * 
     * @param  string $asset
     * @return string
     */
    function assets_url($asset)
    {
        return asset('assets/' . ltrim($asset, '/'));
    }
}

if (! function_exists('uploads')) {
    /**
     * Generate the URL to uploads path
     * 
     * @param  string $upload
     * @return string
     */
    function uploads($upload)
    {
        if (! file_exists(public_path() . '/uploads/' . $upload)) {
            return 'oops, uploaded file not found.';
        }
        return asset('uploads/' . ltrim($upload, '/'));
    }
}

if (! function_exists('uploads_path')) {
    /**
     * Generate the path to uploads file
     * 
     * @param  string $upload
     * @return string
     */
    function uploads_path($upload)
    {
        if (! file_exists(public_path() . '/uploads/' . $upload)) {
            return 'oops, uploaded file not found.';
        }
        return public_path() . '/uploads/' . ltrim($upload, '/');
    }
}
