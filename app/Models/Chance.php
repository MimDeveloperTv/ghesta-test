<?php

namespace App\Models;

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

    protected $fillable = [
        'id',
        'user_id',
        'chance',
        'created_at',
        'updated_at',
    ];

}
