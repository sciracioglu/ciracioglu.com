<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class YaziYonetimiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

     /** @test */
     public function ziyaretci_yazi_ekleyemez()
     {
         $attributes = factory('App\Yazi')->raw();
 
         $this->post('/yazi', $attributes)->assertRedirect('login');
     }

    /** @test */
    public function kullanici_yazi_ekleyebilir()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());

        $this->get('/yazi/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->numberBetween(0,2)
        ];
       
        $this->post('/yazi', $attributes);

        $this->assertDatabaseHas('yazi', $attributes);

        $this->get('/yazi')->assertSee($attributes['title']);
    }

    /** @test */
    public function yazinin_basligi_zorunlu_alan()
    {
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Yazi')->raw(['title'=>'']);
        $this->post('/yazi', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function yazinin_metni_zorunlu_alan()
    {
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Yazi')->raw(['description'=>'']);
        $this->post('/yazi', $attributes)->assertSessionHasErrors('description');
    }

     /** @test */
     public function yazinin_durumu_zorunlu_alan_ve_integer_olmali()
     {
        $this->actingAs(factory('App\User')->create());
         $attributes = factory('App\Yazi')->raw(['status'=>'']);
         $this->post('/yazi', $attributes)->assertSessionHasErrors('status');
     }

   

    /** @test */
    public function ziyaretci_onaylanmis_yaziyi_gorebilir()
    {
        $this->withoutExceptionHandling();
        $yazi = factory('App\Yazi')->create();
        if($yazi->status==1){
            $this->get($yazi->path())
                    ->assertSee($yazi->title)
                    ->assertSee($yazi->description);
        }
        else {
            $this->get($yazi->path())->assertRedirect('login');
        }
        
    }
}
