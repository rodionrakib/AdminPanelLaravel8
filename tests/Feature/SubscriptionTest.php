<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_can_store_subscription_mail()
    {
        $this->withoutExceptionHandling();
        
        $params = [
            'email' => 'darthvader@deathstar.ds'
        ];

        $this->actingAs($this->user())
            ->post('/newsletter-subscriptions', $params)
            ->assertStatus(302)
            ->assertSessionHas('success', 'Email added to the newsletter successfully');

        $this->assertDatabaseHas('newsletter_subscriptions', $params);
    }
}
