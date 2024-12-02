<?php
if (! function_exists('settings')) {
    function settings(?string $key = null, $default = null)
    {
        if (is_null($key)) {
            return app('settings');
        }


        return app('settings')->get($key, $default);
    }
}