<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChatControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function testChats(){
        $this->get('/chats')
            ->assertSee('Create a New Chat Here!');
    }

    public function testCreateChat(){
        $this->post('/create-chat', ['name' => 'New Chat'])
            ->assertRedirect('/chats');
    }
}
