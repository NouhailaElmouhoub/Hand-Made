<!-- resources/views/admin/orders/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Admin - Orders')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Orders</h3>
    </div>
    <div class="card-body">
      @forelse ($orders as $order)
      <div class="card mb-4">
        <div class="card-header">
          Order #{{ $order->getId() }}
        </div>
        <div class="card-body">
          <b>Date:</b> {{ $order->getCreatedAt() }}<br />
          <b>Total:</b> ${{ $order->getTotal() }}<br />
          <table class="table table-bordered table-striped text-center mt-3">
            <thead>
              <tr>
                <th scope="col">Item ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order->getItems() as $item)
              <tr>
                <td>{{ $item->getId() }}</td>
                <td>{{ $item->getProduct()->getName() }}</td>
                <td>${{ $item->getPrice() }}</td>
                <td>{{ $item->getQuantity() }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @empty
      <div class="alert alert-danger" role="alert">
        No orders found.
      </div>
      @endforelse
    </div>
  </div>
</div>
@endsection
