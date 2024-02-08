<?php

namespace App\Actions;

use App\Models\Chance;
use Illuminate\Database\Eloquent\Model;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class GetChanceAction
{
    use AsAction;

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(): Model
    {
        try {
            $chance = (string) ChanceAction::run();
            return Chance::query()->firstOrCreate(['user_id' => auth()->id()],['chance' => $chance]);
        } catch (\Exception $exception) {
            throw new \Exception('Operation Has Error', 500);
        }
    }
}
