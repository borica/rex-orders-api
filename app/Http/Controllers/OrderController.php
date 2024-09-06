<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderServiceInterface $orderService
    ) {
    }

    public function index(): JsonResponse
    {
        $orders = $this->orderService->getOrders();

        return response()->json($orders, Response::HTTP_OK);
    }

    public function show(string $id): JsonResponse
    {
        $order = $this->orderService->getOrderById($id);

        return response()->json($order, Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $order = $this->orderService->createOrder($request->validated());

        return response()->json($order, Response::HTTP_CREATED);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $order = $this->orderService->updateOrder($id, $request->validated());

        return response()->json($order, Response::HTTP_OK);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->orderService->deleteOrder($id);

        return response()->json([], Response::HTTP_ACCEPTED);
    }
}