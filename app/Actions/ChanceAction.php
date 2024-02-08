<?php

namespace App\Actions;

use App\Models\Chance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

class ChanceAction
{
    use AsAction;

    public const BRONZE = 'B';
    public const GRAY = 'Y';
    public const GOLD = 'G';
    public const LOSE = 'X';

    public const LEVELS = [self::BRONZE, self::GRAY, self::GOLD];
    public const WEIGHTS = [100, 10, 1];

    public const VALUES = [self::BRONZE, self::GRAY, self::GOLD,self::LOSE];

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(): string
    {
        $chance = $this->calculateChance();

            if($chance == self::GOLD)
            {
                if(!CheckMaxChanceAction::run()){
                    return self::LOSE;
                }
                Cache::forget('limit');
            }

            return $chance;
    }

    public function calculateChance(): string
    {
        $totalWeight = array_sum(self::WEIGHTS);
        $randomNumber = mt_rand(0, $totalWeight - 1);
        foreach (self::LEVELS as $key => $value) {
            if ($randomNumber < self::WEIGHTS[$key]) {
                return $value;
            }
            $randomNumber -= self::WEIGHTS[$key];
        }
        return self::LOSE;
    }

}
