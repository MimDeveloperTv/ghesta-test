<?php

namespace App\Models;

use App\Actions\CheckMaxChanceAction;
use App\Models\Concerns\HasModelScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\Model;

class Chance extends Model
{
    use HasFactory;
    use HasModelScope;

    public $incrementing = false;

    public $observables = ['creating'];

    public const UPDATED_AT = null;
    public const LEVELS = ['bronze', 'gray', 'gold'];
    public const WEIGHTS = [100, 10, 1];

    public const MAPPER = [
        'lose' => 'X',
        'bronze' => 'B',
        'gold' => 'G',
        'gray' => 'Y',
        ];

    protected $fillable = [
        'id',
        'user_id',
        'chance',
        'created_at',
        'updated_at',
    ];

    public static function getChance(): string
    {
        $totalWeight = array_sum(self::WEIGHTS);
        $randomNumber = mt_rand(0, $totalWeight - 1);
        foreach (self::LEVELS as $key => $value) {
            if ($randomNumber < self::WEIGHTS[$key]) {

                if(!CheckMaxChanceAction::run()){
                    return self::MAPPER['lose'];
                }

                return self::MAPPER[$value];
            }
            $randomNumber -= self::WEIGHTS[$key];
        }
        return self::MAPPER['lose'];
    }

}
