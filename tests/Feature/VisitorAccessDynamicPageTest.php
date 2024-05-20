<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitorAccessDynamicPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_visitor_can_access_dynamic_page(): void
    {
        $page = Page::create([
            'slug' => 'testing',
            'title' => 'testing',
            'content' => 'testing'
        ]);
        $response = $this->get(route('page.show', ['page' => $page->slug]));
        $response->assertStatus(200);

        Page::destroy($page->id);
    }
}
