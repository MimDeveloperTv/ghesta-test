<?php

namespace App\Observer;

use App\Models\Chance;
use App\Models\Concerns\Model;
use Faker\ChanceGenerator;
use Illuminate\Console\View\Components\Choice;
use Illuminate\Support\Str;
use Termwind\Helpers\QuestionHelper;

class KeyAndChanceObserver
{
    public function creating(Model $model)
    {
        $model->id = (string) Str::ulid();
        $model->chance = (string) Chance::getChance();

    }
}
