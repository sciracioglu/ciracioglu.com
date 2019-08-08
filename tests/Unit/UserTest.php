<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    function kullanicinin_yazisi()
    {
        $user = factory('App\User')->create();
        $this->assertInstanceOf(Collection::class,$user->yazilar);
    }
}
