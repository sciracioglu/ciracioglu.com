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
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence
        ];
        $this->post('/kategori', $attributes)->assertRedirect('/kategori');

        $this->assertDatabaseHas('kategori', $attributes);
        
        $this->get('/kategori')->assertSee($attributes['title']);
    }

    /** @test */
    function kategorinin_basligi_olmali()
    {
        $this->post('/kategori', [])->assertSessionHasErrors('title');
    }
}
