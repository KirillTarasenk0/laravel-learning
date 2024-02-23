@php
    $products = ['product1', 'product2', 'product3', 'product4'];
@endphp
<div>
    @forelse($products as $product)
        <p>Product: {{ $product }}</p>
    @empty
        <p>No products</p>
    @endforelse
</div>
