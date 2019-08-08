<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KategoriTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function kullanici_kategori_olusturabilir()
    {
        $attributes = [
            'title' => $this->faker->sentence
        ];
        $this->actingAs(factory('App\User')->create());
        $this->post('/kategori', $attributes)->assertRedirect('/kategori');

        $this->assertDatabaseHas('kategori', $attributes);

        $this->get('/kategori')->assertSee($attributes['title']);
    }

    /** @test */
    public function ziyaretci_kategori_olusturamaz()
    {
        $attributes = factory('App\Kategori')->raw();
        $this->post('/kategori', $attributes)->assertRedirect('login');

    }

    /** @test */
    public function kategorinin_basligi_olmali()
    {
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Kategori')->raw(['title'=>'']);
        $this->post('/kategori', $attributes)->assertSessionHasErrors('title');
    }
}
