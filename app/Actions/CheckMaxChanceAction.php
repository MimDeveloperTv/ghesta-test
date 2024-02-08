<?php

namespace App\Actions;

use App\Models\Chance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class CheckMaxChanceAction
{
    use AsAction;

    public const MAX_LIMIT = 3;
    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(): bool
    {
      $limit = Cache::rememberForever('limit',function (){
            return Chance::query()->where('chance','G')->count('chance');
        });

      return $limit != self::MAX_LIMIT;
    }
}
