<?php

namespace App\Observer;

use App\Models\Concerns\Model;
use Illuminate\Support\Str;

class KeyAndChanceObserver
{
    public function creating(Model $model)
    {
        $model->id = (string) Str::ulid();
    }
}
