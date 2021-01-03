<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function admin()
    {
    	$admin = User::factory()->create();
  	$admin->assignRole( Role::create(['name' => 'admin']));
      return $admin;  
    }

    protected function user()
    {
    	return User::factory()->create();
    }
}
