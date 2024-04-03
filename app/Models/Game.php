<?php

namespace App\Models;

use App\Observers\GameCacheObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([GameCacheObserver::class])]
class Game extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['genre','publisher'];

    function genre() : BelongsTo {
        return $this->belongsTo(Genre::class);
    }
    
    function publisher() : BelongsTo {
        return $this->belongsTo(Publisher::class);
    }

}
