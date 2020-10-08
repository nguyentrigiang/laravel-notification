<?php

namespace GiangNT\LaravelNotification\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

    /**
     * Declare the table name
     */
    protected $table = 'notification_configuration';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'days_of_the_week' => 'json',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time', 'end_time', 'days_of_the_week'
    ];

    /**
     * Get a ownership model.
     */
    public function owner()
    {
        return $this->morphTo();
    }

    public function isSend($datetime) {
        $time = strtotime($datetime);

        if (!in_array(date('l', $time), $this->days_of_the_week)) return false;

        $start_time = strtotime($this->start_time);
        $end_time = strtotime($this->end_time);
        $current_time = strtotime(date('G:i', $time));
        if ($current_time < $start_time || $current_time > $end_time) return false;

        return true;
    }
}
