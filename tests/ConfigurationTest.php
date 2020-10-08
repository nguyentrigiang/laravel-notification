<?php

namespace GiangNT\LaravelNotification\Tests;

use GiangNT\LaravelNotification\Tests\Models\User;
use GiangNT\LaravelNotification\Models\Configuration;

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
            'days_of_the_week' => ['Monday', 'Tuesday'],
        ];
        $user->addConfiguration($data);
        $user->resetConfiguration();
        $this->assertEquals(null, $user->configuration);
    }

    /**
     * Test configuration deletion function.
     */
    public function testIsSendFunction()
    {
        $configuration = new Configuration;
        $configuration->start_time = '5:00';
        $configuration->end_time = '22:59';
        $configuration->days_of_the_week = ['Monday', 'Tuesday'];

        $this->assertEquals(false, $configuration->isSend('2020/10/08 10:59'));
        $this->assertEquals(true, $configuration->isSend('2020/10/06 10:59'));
        $this->assertEquals(false, $configuration->isSend('2020/10/06 4:59'));
        $this->assertEquals(false, $configuration->isSend('2020/10/06 23:00'));
    }
}
