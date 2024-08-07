<div>
    <h1>{{ $search->v_name }}</h1>
    <p>Qty:{{ $search->qty }}</p>
    <p>Price:{{ $search->price }}</p>
    
</div>

@foreach ($search as $product)
  
@endforeach

