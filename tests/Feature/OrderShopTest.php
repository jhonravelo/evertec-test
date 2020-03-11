<?php namespace Tests\Feature;

use Tests\TestCase;

class OrderShopTest extends TestCase{

    public function testwebPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testCreateOrder()
    {
        $response = $this->get('/order/create');
        $response->assertStatus(200);
    }

    public function testOrderDetail()
    {
        $response = $this->get('/order/1/cart');
        $response->assertStatus(200);
    }

    public function testAdminShop()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

}
