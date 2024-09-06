<?php

use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Services\OrderService;

beforeEach(function () {
    $this->orderService = Mockery::mock(OrderService::class);
    $this->sut = new OrderController($this->orderService);
});


test('It should return all orders', function () {
    $orders = collect([
        new Order(['id' => 'uuid_1', 'user_id' => 1, 'product_id' => 2, 'quantity' => 3]),
        new Order(['id' => 'uuid_2', 'user_id' => 1, 'product_id' => 2, 'quantity' => 3]),
    ]);

    $this->orderService->shouldReceive('getOrders')
        ->once()
        ->andReturn($orders);

    $result = $this->sut->index();

    expect($result->getData(true))->toHaveCount(2);
});
