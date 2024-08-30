@include('header')



<body>

    

<div class="modalwindow" style="display: none;">
    <div class="modalcontent"> 
        <div class="modal-header">
            <h2 id="caketitle"></h2>
        </div>
        <div class="container-center">
            <div class="container-left">
                <div class="imageCake">
                    <img src="" class="modalimage">
                </div>
            </div>
            <div class="container-right">
                <fieldset class="titlecake">
                    <legend>Начинка:</legend>
                    <div class="nachinka">
                        <select class="ChooseDelivery" id="delivery-time">
                            @foreach ($nachinka as $nachinkas)
                                <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                            @endforeach
                        </select>
                    </div>
                    <legend>Количество</legend>
                    <select size="1" id="quantity">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <div class="infocakecardmodal">
                        <span>Цена: <span id="priceDisplay"></span></span> <!-- Отображение цены -->
                    </div>
                </fieldset>
                <div class="button">
                    <button type="submit" name="click_button[]" value="">Заказать</button>
                </div>
            </div>
        </div>
        <span class="closebutton">&times;</span>
    </div>
</div>






    <main>
        <div class="catalog-lenta">
            @foreach ($product as $products)
                <form action="{{route('basketAdd',$products)}}" method="POST">
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
                            <button type="submit" name="click_button" id="modalInput" readonly>В корзину</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </main>
</body>





@include('footer')