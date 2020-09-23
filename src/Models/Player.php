<?php

namespace GiangNT\LaravelNotification\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    /**
     * Declare the table name
     */
    protected $table = 'notifications_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id'
    ];

    /**
     * Get a player ownership model.
     */
    public function owner()
    {
        return $this->morphTo();
    }
}
