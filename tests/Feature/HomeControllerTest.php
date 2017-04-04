<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function testHome(){
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get('/home')
            ->assertSee($user->name);
    }

    public function testProfile(){
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get('/profile')
            ->assertSee('ID: '.$user->id);
    }

    public function testUpdate(){
        $user = factory(User::class)->create();
        $name = 'RANDOM NAME';
        $this->actingAs($user)
            ->post('/update', ['name' => $name])
            ->assertSee($name);
    }
}
