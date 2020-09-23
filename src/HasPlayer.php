<?php

namespace GiangNT\LaravelNotification;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasPlayer
{
    public function players(): MorphMany;

    /**
     * Add a player to owner.
     *
     * @param string $player_id
     *
     * @return \GGPHP\GGNotifications\Models\Player
     */
    public function addPlayer($player_id);

    /**
     * Delete the associated player with player_id.
     *
     * @param string $player_id
     *
     * @return int
     */
    public function deletePlayer($player_id);

    /**
     * Clear the associated players.
     *
     * @return int
     */
    public function clearPlayer();
}
