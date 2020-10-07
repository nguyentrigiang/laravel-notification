<?php

namespace GiangNT\LaravelNotification;

use GiangNT\LaravelNotification\Models\Player;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait InteractsWithPlayer
{
    public function players(): MorphMany
    {
        return $this->morphMany(Player::class, 'owner');
    }

    /**
     * Add a player to owner.
     *
     * @param $player_id
     */
    public function addPlayer($player_id)
    {
        return $this->players()->firstOrCreate(['player_id' => $player_id]);
    }

    /**
     * Delete the associated player with player_id.
     *
     * @param $player_id
     */
    public function deletePlayer($player_id)
    {
        return $this->players()->where('player_id', $player_id)->delete();
    }

    /**
     * Clear the associated players.
     *
     * @param $player_id
     */
    public function clearPlayer()
    {
        return $this->players()->delete();
    }
}
