<?php

namespace Tests\Feature;

use App\Models\File;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitorAccessFilePagesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_access_homepage(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_user_can_access_popular_files_page(): void
    {
        $response = $this->get(route('popular'));
        $response->assertStatus(200);
    }

    public function test_user_can_access_latest_upload_page(): void
    {
        $response = $this->get(route('latest'));
        $response->assertStatus(200);
    }

    public function test_user_can_access_detail_file(): void
    {
        $file = File::select('slug')->first();
        if (!$file) {
            throw new Exception('Test Error No File Inserted to DB');
        }
        $response = $this->get(route('showDetailFile', ['file' => $file->slug]));
        $response->assertStatus(200);
    }

    public function test_user_can_access_uploaded_user_detail_files(): void
    {
        $user = User::select('username')->first();
        if (!$user) {
            throw new Exception('Test Error No User Inserted to DB');
        }
        $response = $this->get(route('detailUserFiles', ['user' => $user->username]));
        $response->assertStatus(200);
    }
}
