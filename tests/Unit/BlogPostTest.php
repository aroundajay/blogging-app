<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Post;
use App\Models\User;

class BlogPostTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt($password = 'password'),
        ]);
    }

    /**
     * User can create blog post.
     */
    public function test_user_can_create_blog_post()
    {
        $this->actingAs($this->user);

        $data = [
            'title' => 'Test Blog Post',
            'content' => 'This is a test blog post content.',
        ];

        $response = $this->post('/posts', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', $data);
    }

    /**
     * User can update blog post.
     */
    public function test_user_can_update_blog_post()
    {
        $this->actingAs($this->user);

        $post = Post::factory()->create([
            'user_id' => $this->user->id
        ]);

        $data = [
            'title' => 'Updated Blog Post Title',
            'content' => 'Updated blog post content.',
        ];

        $response = $this->put("/posts/{$post->id}", $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', $data);
    }

    /**
     * User can delete blog post.
     */
    public function test_user_can_delete_blog_post()
    {
        $this->actingAs($this->user);

        $post = Post::factory()->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->delete("/posts/{$post->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    /**
     * User can update blog post.
     */
    public function test_user_can_not_update_blog_post_created_by_other_user()
    {
        $this->actingAs($this->user);

        $user = User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt($password = 'password'),
        ]);

        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);

        $data = [
            'title' => 'Updated Blog Post Title',
            'content' => 'Updated blog post content.',
        ];

        $response = $this->put("/posts/{$post->id}", $data);

        $response->assertStatus(403);
        $this->assertDatabaseMissing('posts', ['title' => $data['title']]);
    }

    /**
     * User can delete blog post.
     */
    public function test_user_can_not_delete_blog_post_created_by_other_user()
    {
        $this->actingAs($this->user);

        $user = User::factory()->create([
            'email' => 'test2@example.com',
            'password' => bcrypt($password = 'password'),
        ]);

        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->delete("/posts/{$post->id}");

        $response->assertStatus(403);
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title
        ]);
    }
}
