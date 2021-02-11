<?php
if (! function_exists('readAttribute')) {
    function readAttribute(array $attributes, string $key): ?string
    {
        return ! empty($attributes[$key]) ? $attributes[$key] : null;
    }
}

if (! function_exists('getUserModel')) {
    function getUserModel(): ?string
    {
        return config('users.model');
    }
}
