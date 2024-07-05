@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="card">
  <div class="card-header">
    Products in Cart
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Actions</th> <!-- Nouvelle colonne pour les actions -->
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>${{ $product->getPrice() }}</td>
          <td>{{ session('products')[$product->getId()] }}</td>
          <td>
            <form action="{{ route('cart.remove', ['id' => $product->getId(), 'type' => 'product']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Remove</button>
            </form>
          </td>
        </tr>
        @endforeach

        @if (isset($viewData["bols"]))
          @foreach ($viewData["bols"] as $bl)
          <tr>
            <td>{{ $bl->getId() }}</td>
            <td>{{ $bl->getName() }}</td>
            <td>${{ $bl->getPrice() }}</td>
            <td>{{ session('bols')[$bl->getId()] }}</td>
            <td>
              <form action="{{ route('cart.remove', ['id' => $bl->getId(), 'type' => 'bol']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
              </form>
            </td>
          </tr>
          @endforeach
        @endif

        @if (isset($viewData["plats"]))
          @foreach ($viewData["plats"] as $pl)
          <tr>
            <td>{{ $pl->getId() }}</td>
            <td>{{ $pl->getName() }}</td>
            <td>${{ $pl->getPrice() }}</td>
            <td>{{ session('plats')[$pl->getId()] }}</td>
            <td>
              <form action="{{ route('cart.remove', ['id' => $pl->getId(), 'type' => 'plat']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
              </form>
            </td>
          </tr>
          @endforeach
        @endif

        @if (isset($viewData["assietes"]))
          @foreach ($viewData["assietes"] as $as)
          <tr>
            <td>{{ $as->getId() }}</td>
            <td>{{ $as->getName() }}</td>
            <td>${{ $as->getPrice() }}</td>
            <td>{{ session('assietes')[$as->getId()] }}</td>
            <td>
              <form action="{{ route('cart.remove', ['id' => $as->getId(), 'type' => 'assiette']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
              </form>
            </td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    <div class="row">
      <div class="text-end">
        <!-- Afficher le total à payer -->
        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
        <!-- Afficher le bouton Purchase seulement s'il y a des produits dans le panier -->
        @if (count($viewData["products"]) > 0 || count($viewData["bols"]) > 0 || count($viewData["plats"]) > 0 || count($viewData["assietes"]) > 0)
        
        <tfoot>
          <tr>
              <td colspan="5" style="text-align:right;"><h3><strong></strong></h3></td>
          </tr>
          <tr>
              <td colspan="5" style="text-align:right;">
                  <form action="/session" method="POST">
                  <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type='hidden' name="total" value="6">
                  <input type='hidden' name="productname" value="Asus Vivobook 17 Laptop - Intel Core 10th">
                  <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                          <!-- Afficher le bouton pour supprimer tous les produits du panier -->
        <a href="{{ route('cart.delete') }}">
          <button class="btn btn-danger mb-2">
            Remove all products from Cart
          </button>
        </a></form>
              </td>
          </tr>
      </tfoot>
        

        @endif
      </div>
  </div>
</div>
@endsection
