<?php

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PostTest extends TestCase
{
    	use RefreshDatabase;

    	public function test_admin_can_visit_post_create_page()
    	{
		$this->actingAs($this->admin());
	  	$this->get('/admin/posts/create')
	      ->assertOk()
	      ->assertSee('Create Post');
    	}


    	public function test_can_publish_post()
    	{

		$this->actingAs($this->admin());
		
		$arrtibutes = array_merge( Post::factory()->raw(),['action' => 'publish']) ;
		
		$arrtibutes['cover'] = UploadedFile::fake()->image('cover.jpg');

		$this->post('admin/posts',$arrtibutes)
			->assertRedirect('admin/posts');
		
		$this->assertDatabaseHas('posts',$data = collect($arrtibutes)->except(['action','cover'])->toArray());
		$post = Post::where($data)->first();
		$this->assertCount(1,$post->getMedia());

		$this->assertNotNull($post->published_at);
    	}

    	public function test_can_save_post()
    	{

		$this->actingAs($this->admin());
		
		$arrtibutes = array_merge( Post::factory()->raw(),['action' => 'save']) ;

		$this->post('admin/posts',$arrtibutes)
			->assertRedirect('admin/posts');
		
		$this->assertDatabaseHas('posts',$data = collect($arrtibutes)->except('action')->toArray());
		$post = Post::where($data)->first();
		$this->assertNull($post->published_at);
    	}

    	public function test_post_can_be_deleted()
    	{
    		$this->withoutExceptionHandling();
    		$this->actingAs($this->admin());
    		$post = Post::factory()->create();
    		
    		$this->delete(route('admin.posts.destroy',['post' => $post->id]))
    			->assertRedirect(route('admin.posts.index'))
    			->assertSessionHas('message','Post deleted !');
    		$this->assertDatabaseMissing('posts',['id' => $post->id]);
    	}
}
