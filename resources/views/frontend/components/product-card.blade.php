<div class="product">

<img src="{{ asset('storage/'.$product->image) }}">

<h3>{{ $product->name }}</h3>
<p class="price">₹{{ $product->price }}</p>

<a href="/product/{{ $product->id }}" class="btn">View</a>

</div>