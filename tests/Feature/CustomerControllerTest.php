<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    /**
     * @test
     */
    public function itListsCustomers()
    {
        $response = $this->get('/api/customers');

        $response->assertOk();

        $this->assertCount(20, dd($response->json('data')));
    }
}
