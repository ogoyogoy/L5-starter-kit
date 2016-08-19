<?php

if ( ! function_exists('assets_url')) {
    function assets_url($asset)
    {
        return asset('assets/' . ltrim($asset, '/'));
    }
}

if ( ! function_exists('uploads')) {
    function uploads($upload)
    {
        if (file_exists(public_path() . 'uploads/' . $upload)) {
            return 'no image broh';
        }
        return asset('uploads/' . ltrim($upload, '/'));
    }
}
