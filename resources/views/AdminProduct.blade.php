@include('header')
<body>
    


    <main>
        <div class="catalog-lenta">
            @foreach ($product as $products)
                 <form action="{{route('DeleteProduct',$products)}}" method="POST">
                    @csrf
                    <div class="catalog-cake_card">
                        <div class="image">
                            <img src="{{asset('storage/'.$products->image)}}" class="imagi">
                        </div>
                        <div class="info_cake">
                            <h2 name="cake_name">{{ $products->name_cake }}</h2>    
                        </div>
                        <div class="button">
                            <span name="price" value="{{ $products->price }}">{{ $products->price }}</span>
                            <button type="submit" name="click_button" id="modalInput" readonly>Удалить</button>
                        </div>
                    </div>
                 </form> 
            @endforeach
        </div>
    </main>
</body>


@include('footer')