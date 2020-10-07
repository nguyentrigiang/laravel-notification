<?php

namespace GiangNT\LaravelNotification\Tests;

use GiangNT\LaravelNotification\Tests\Models\User;
use GiangNT\LaravelNotification\Models\Configuration;
use GiangNT\LaravelNotification\Tests\Notification\UserRegisted;
use GiangNT\LaravelNotification\Channels\OnesignalChannel;

/**
 * Class BaseTests
 *
 * @package Tests
 */
class ConfigurationTest extends TestCase
{
    /**
     * Test configuration creation function.
     */
    public function testAddConfigurationFunction()
    {
        $user = User::create([
            'name' => 'Nguyen Tri Giang',
            'email' => 'nguyentrigiang1991@gmail.com',
            'password' => '123456'
        ]);
        $data = [
            'start_time' => '5:00',
            'end_time' => '21:59',
            'days_of_the_week' => ['Monday', 'Tuesday']
        ];
        $user->addConfiguration($data);
        $this->assertEquals(1, $user->configuration->count());
        $user->addConfiguration($data);
        $this->assertEquals(1, $user->configuration->count());
    }

    /**
     * Test configuration deletion function.
     */
    public function testResetFunction()
    {
        $user = User::create([
            'name' => 'Nguyen Tri Giang',
            'email' => 'nguyentrigiang1991@gmail.com',
            'password' => '123456'
        ]);
        $data = [
            'start_time' => '5:00',
            'end_time' => '22:59',
            'days_of_the_week' => ['Monday', 'Tuesday']
        ];
        $user->addConfiguration($data);
        $user->resetConfiguration();
        $this->assertEquals(null, $user->configuration);
    }
}
