@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
{{-- <div class="row">
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/carrot red per kg - vegetables.png') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/baby kiwi - fruits.png') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/dragonfruit - fruits.png') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/cauliflower 1 pc - vegetables.png') }}" class="img-fluid rounded">
  </div>
</div> --}}
<style>
  .hero{
    height: 100vh;
    background: linear-gradient(180deg,#BA4B2F,#e1e7e144 60%);
    display: flex;

}
.hero-left{
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;ZZ
    gap: 20px;
    padding-left: 180px;
    line-height: 1.1;
}
.hero-left h2{
    color: #090909;
    font-size: 26px;
    font-weight: 600;

}
.hero-left p{
    color: #171717;
    font-size: 50px; 
    font-weight: 700;
}

.hero-lastest-btn{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    width: 310px;
    height: 70px;
    border-radius: 75px;
    margin-top: 30px;
    background:#BA4B2F;
    color: white;
    font-size: 22px;
    font-weight: 500;
}
.hero-right{
    flex: 2;
    display: flex;
    align-items:center ;
    justify-content: center;
    
}
.hero-right img {
    width: 400px; /* Ajustez cette valeur selon la taille désirée */
    height: auto; /* Conserve le ratio d'aspect de l'image */
}
.popular{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    height: 90vh;
}
.popular h1{
    color: #171717;
    font-size: 50px;
    font-weight: 600;
}
.popular hr{
    width: 200px;
    height: 6px;
    border-radius: 10px;
    background: #252525; ;
}
.popular-item{
    margin-top: 50px;
    display: flex;
    gap:30px ;
}

</style>
<div class="hero">
  <div class="hero-left">
    <h1>Le Lifestyle Marocain</h1>
    <div>
      <div class="hand-hand-icon">
        <p>traditionnel revisité.</p>
        
      </div>
      <p>Tendance,Chic</p>  
      <p>et uniquement fait main.</p>
    </div>
    <div class="hero-lastest-btn">
      <div><a href="{{route('promo.index')}}" class="text-dark">Promotions</a></div>
      
    </div>
  </div>
  <div class="hero-right">
    <img src="img/freepik-export-20240521085327hyXL.png" alt="Hero Image">
  </div>


</div>
<div class="popular">
  <h1>Produits populaires</h1>
  <hr />
  <div class="popular-item">
    <!-- Example Product Item -->
    <div class="item">
      <img src="img/Capture .png" alt="Product 1">
      <h3>Product 1</h3>
      <div class="prices">
        <span class="new-price">$19.99</span>
        <span class="old-price">$29.99</span>
      </div>
    </div>
    <div class="item">
      <img src="img/Capture d’écra(28).png" alt="Product 2">
      <h3>Product 2</h3>
      <div class="prices">
        <span class="new-price">$24.99</span>
        <span class="old-price">$34.99</span>
      </div>
    </div>
    <div class="item">
      <img src="img/Capture d’écran (32.png" alt="Product 2">
      <h3>Product 3</h3>
      <div class="prices">
        <span class="new-price">$24.99</span>
        <span class="old-price">$34.99</span>
      </div>
    </div>
    <div class="item">
      <img src="img/Capture d’écran (34).png" alt="Product 2">
      <h3>Product 4</h3>
      <div class="prices">
        <span class="new-price">$24.99</span>
        <span class="old-price">$34.99</span>
      </div>
    </div>
    <!-- Add more product items as needed -->
  </div>
</div>
@endsection


