<?php

namespace GiangNT\LaravelNotification;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasConfiguration
{
    public function configuration(): MorphOne;

    /**
     * Add a configuration to owner.
     *
     * @param array $data
     *
     * @return \GGPHP\GGNotifications\Models\Configuration
     */
    public function addConfiguration($data);

    /**
     * Delete the associated configuration.
     *
     * @return int
     */
    public function resetConfiguration();
}
