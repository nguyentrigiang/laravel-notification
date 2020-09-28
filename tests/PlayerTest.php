<?php

namespace GiangNT\LaravelNotification\Tests;

use GiangNT\LaravelNotification\Tests\Models\User;

/**
 * Class BaseTests
 *
 * @package Tests
 */
class PlayerTest extends TestCase
{
    /**
     * Test player creation function.
     */
    public function testCreateFunction()
    {
        $user = User::create(['name' => 'Nguyen Tri Giang']);
        $user->addPlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
        $this->assertEquals(1, $user->players->count());
    }

    /**
     * Test player deletion function.
     */
    public function testDeleteFunction()
    {
        $user = User::create(['name' => 'Nguyen Tri Giang']);
        $user->addPlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
        $this->assertEquals(1, $user->players->count());
        $user->deletePlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
        $user->refresh();
        $this->assertEquals(0, $user->players->count());
    }

    /**
     * Test player clearing function.
     */
    public function testClearFunction()
    {
        $user = User::create(['name' => 'Nguyen Tri Giang']);
        $user->addPlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
        $user->addPlayer('b4de36c7-e81d-4690-a15e-c15864b9e2c2');
        $this->assertEquals(2, $user->players->count());
        $user->clearPlayer();
        $user->refresh();
        $this->assertEquals(0, $user->players->count());
    }

    /**
     * Test player listing function.
     */
    public function testListFunction()
    {
        $user = User::create(['name' => 'Nguyen Tri Giang']);
        $user2 = User::create(['name' => 'Nguyen Tri Giang 2']);
        $user->addPlayer('5ea79c81-327f-4d8b-98b1-58dbd22a277b');
        $user->addPlayer('b4de36c7-e81d-4690-a15e-c15864b9e2c2');
        $user2->addPlayer('15380637-09da-4755-95e2-d53613548716');
        $this->assertEquals(2, $user->players->count());
        $this->assertEquals(1, $user2->players->count());
    }
}
