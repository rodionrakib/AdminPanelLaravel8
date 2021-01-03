<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
     

        $response = $this->post('/login', [
            'email' => $this->user()->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {

        $this->post('/login', [
            'email' => $this->user()->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_user_with_admin_role_redirect_to_admin_dashboard_after_login()
    {
        

        $this->post('/login', [
            'email' => $this->admin()->email,
            'password' => 'password',
        ])->assertRedirect('admin/dashboard');      
    }
    
    public function test_guest_can_not_to_visit_admin_dashboard()
    {
        $this->get('admin/dashboard')->assertRedirect('login');
    }

    public function test_user_can_not_to_visit_admin_dashboard()
    {
        $this->actingAs($this->user());
        $this->get('admin/dashboard')->assertStatus(403);
    }


}
