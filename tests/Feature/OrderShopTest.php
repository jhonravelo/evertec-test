<?php namespace Tests\Feature;

use Tests\TestCase;

class OrderShopTest extends TestCase{

    public function testwebPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

}
