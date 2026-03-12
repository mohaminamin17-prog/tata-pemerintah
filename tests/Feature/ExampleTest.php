<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_beranda_page_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_profil_page_returns_a_successful_response()
    {
        $response = $this->get('/profil');
        $response->assertStatus(200);
    }

    public function test_otda_page_returns_a_successful_response()
    {
        $response = $this->get('/sub-bagian/otda');
        $response->assertStatus(200);
    }

    public function test_pemerintahan_page_returns_a_successful_response()
    {
        $response = $this->get('/sub-bagian/pemerintahan');
        $response->assertStatus(200);
    }

    public function test_kewilayahan_page_returns_a_successful_response()
    {
        $response = $this->get('/sub-bagian/kewilayahan');
        $response->assertStatus(200);
    }

    public function test_dokumentasi_page_returns_a_successful_response()
    {
        $response = $this->get('/dokumentasi');
        $response->assertStatus(200);
    }
}
