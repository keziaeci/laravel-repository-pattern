<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function genre() : BelongsTo {
        return $this->belongsTo(Genre::class);
    }
    
    function publisher() : BelongsTo {
        return $this->belongsTo(Publisher::class);
    }

}
