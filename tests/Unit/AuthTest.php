<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User login test with valid credentials.
     */
    public function test_user_can_login_with_valid_credentials()
    {
        // Arrange
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt($password = 'password123'),
        ]);

        // Act
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => $password,
        ]);

        // Assert
        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * User login test with invalid credentials.
     */
    public function test_user_cannot_login_with_invalid_credentials()
    {
        // Arrange
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Act
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'invalid-password',
        ]);

        // Assert
        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['password']);
        $this->assertGuest();
    }

    /**
     * User login test with invalid credentials.
     */
    public function test_authenticated_user_can_logout()
    {
        // Arrange
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);

        // Act
        $this->actingAs($user);
        $response = $this->get('/logout');

        // Assert
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
