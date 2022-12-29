<?php

namespace Tests\Feature;

use Tests\TestCase;

class TranslateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_translate()
    {
        $response = $this->get('/api/translate?text=hello&language=hy');

        $response->assertStatus(200);
    }
}
