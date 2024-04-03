<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Facades\Cache;

class GameCacheObserver
{
    /**
     * Handle the Game "created" event.
     */
    public function created(Game $game): void
    {
        Cache::forget('games');
    }

    /**
     * Handle the Game "updated" event.
     */
    public function updated(Game $game): void
    {
        Cache::forget('games');
    }

    /**
     * Handle the Game "deleted" event.
     */
    public function deleted(Game $game): void
    {
        Cache::forget('games');
    }

    /**
     * Handle the Game "restored" event.
     */
    public function restored(Game $game): void
    {
        //
    }

    /**
     * Handle the Game "force deleted" event.
     */
    public function forceDeleted(Game $game): void
    {
        //
    }
}
