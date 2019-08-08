<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class YaziTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function yolu_olmali()
    {
        $yazi = factory('App\Yazi')->create();

        $this->assertEquals('/yazi/'.$yazi->id, $yazi->path());
    }

    /** @test */
    function sahibi()
    {
        $yazi = factory('App\Yazi')->create();

        $this->assertInstanceOf('App\User', $yazi->owner);
    }

}
