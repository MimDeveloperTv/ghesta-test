<?php

namespace App\Actions;

use App\Models\Chance;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class CheckMaxChanceAction
{
    use AsAction;

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(): bool
    {
        // if() not above 3 gold gusses odds else self::MAPPER['lose']
      return true;
    }
}
