<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasPrimaryUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {
            data_set($model, 'id', Str::uuid()->toString());
        });
    }
}
