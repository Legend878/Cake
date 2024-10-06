@include('header')
    <div id="cart-modal" class="modal">
       {{--обьеним 2 блока--}}
         <div class="modal-content-basket"> {{-- первый блок корзины с товаррами --}}
          <div class ="trubleblock">
          <div class="doubleblock">
          <div class="block_header">
            <div class="modal-header">
              <h2>Корзина</h2>
            </div>
            <div class="modal-body">
              @if(session('cart'))
              <table class="product-table">
                  <thead>
                      <tr>
                          <th>Изображение</th>
                          <th>Наименование</th>
                          <th>Размер</th>
                          <th>Начинка</th>
                          <th>Количество</th>
                          <th>Цена</th>
                          <th>Действия</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach(session('cart') as $id => $item)
                          @if($item['name_cake'] === 'Доставка') <!-- Проверяем, является ли элемент доставкой -->
                              @continue <!-- Пропускаем итерацию для доставки -->
                          @endif
                          <tr class="product_item">
                              <td><img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name_cake'] }}" class="product-image"></td>
                              <td>{{ $item['name_cake'] }}</td>
                              <td>{{ $item['size'] }}</td>
                              <td>{{ $item['nachinka'] }}</td>
                              <td>{{ $item['quantity'] }} шт.</td>
                              <td>{{ (int)$item['price'] }} &#8381;</td>
                              <td>
                                  <form action="{{ route('deletebasket') }}" method="POST" style="display:inline;">
                                      @csrf
                                      <input type="hidden" name="unique_key" value="{{ $item['id'] }}-{{ $item['size'] }}-{{ $item['nachinka'] }}">
                                      @if($item['name_cake'] !== 'Доставка') <!-- Условие для проверки, не является ли товар доставкой -->
                                          <button type="submit" class="button-delete">&times; Удалить</button>
                                      @endif
                                  </form>
                              </td>
                          </tr>
                      @endforeach <!-- Закрываем цикл foreach -->
                  </tbody>
              </table>
          @else
              <p>Ваша корзина пуста.</p> <!-- Сообщение, если корзина пустая -->
          @endif
          </div>
          <div class="modal-body-two">
            @if(session('cart'))
          <table class="product-table">
              <thead>
                  <tr>
                      <th>Изображение</th>
                      <th>Товар</th> <!-- Объединенный заголовок -->
                      <th>Цена</th>
                      <th>Действия</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach(session('cart') as $id => $item)
                      @if($item['name_cake'] === 'Доставка') <!-- Проверяем, является ли элемент доставкой -->
                          @continue <!-- Пропускаем итерацию для доставки -->
                      @endif
                      <tr class="product_item">
                          <td><img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name_cake'] }}" class="product-image"></td>
      
                          <!-- Объединяем ячейки для мобильного отображения -->
                          <td class="combined-cell">
                              <div class="product-details">
                                  <strong>{{ $item['name_cake'] }}</strong><br>
                                  {{ $item['size'] }}<br>
                                  {{ $item['nachinka'] }}<br>
                                  {{ $item['quantity'] }} шт.
                              </div>
                          </td>
      
                          <td>{{ (int)$item['price'] }} &#8381;</td>
                          <td>
                              <form action="{{ route('deletebasket') }}" method="POST" style="display:inline;">
                                  @csrf
                                  <input type="hidden" name="unique_key" value="{{ $item['id'] }}-{{ $item['size'] }}-{{ $item['nachinka'] }}">
                                  @if($item['name_cake'] !== 'Доставка') <!-- Условие для проверки, не является ли товар доставкой -->
                                      <button type="submit" class="button-delete"> Удалить</button>
                                  @endif
                              </form>
                          </td>
                      </tr>
                  @endforeach <!-- Закрываем цикл foreach -->
              </tbody>
          </table>
      @else
          <p>Ваша корзина пуста.</p> <!-- Сообщение, если корзина пустая -->
      @endif
          </div>
          </div>
          <form class="obrabotka" action="{{route('pay'), $totalPrice}}"  method="post" enctype="multipart/form-data">
            @csrf 
          <div class="block_body"> 

            <div class="modal-header">
              <h2>Мои Данные</h2>
            </div>  

            <div class="info_users"> {{--второй блок инфа пользователя --}}
{{--1 блок--}}
              <div class="block_client">

              <div class="info_client">
                <span>Получатель</span>
              </div>

              <div class="client">

                <div class="client_name_lastname">
  
                <label class="form_users">
                  <span>Ваше Имя</span>
                  <input type="text" name="name" value="{{ old('name') }}"  autocomplete="username" autofocus >
                </label>
                <label class="form_users" >
                  <span>Контактный номер телефона</span>
                  <input type="tel" name="number_phone" value ="+7" placeholder="+7 999 999 99 99"  autocomplete />
              </label>
                

                </div>
                <div class="client_connection">

                  <label class="form_users">
                    <span>Ваша Фамилия</span>
                    <input type="text" name="lastname"  autocomplete="username" value="{{ old('lastname') }}" autofocus >
                    </label>
            <label class="form_users">
                <span>Ваш Email</span>
                <input type="Email" name="Email" placeholder="NatalieCakeWork@yandex.ru" value="{{ old('Email') }}" autocomplete>
            </label>

                </div>
              </div>
              </div>
{{--..--}}
{{--2 блок--}}
              <div class="block_client">

                <div class="info_client">
                  <span>Доставка</span>
                </div>
                <div class="double_client">

                <div class="form_radio_btn">
                  
                  @foreach($delivery as $deliveries)
                  <input id="{{$deliveries->id}}" type="radio" name="delivery" value="{{$deliveries->id}}" onchange="updateText()"   onchange="handleDeliveryChange(this)" 
                  @if($loop->first && !session('cart') || !isset(session('cart')['delivery']))   @endif>
            {{--onchange="updateText()"  @if($loop->first) checked @endif --}}
                  <label id="selected-delivery" for="{{$deliveries->id}}">{{$deliveries->type_del}}</label>
                  @endforeach

                </div>

  

                
                


                <div  id="delivery-info" class="client_delivery" style="display: flex">

              <label class="Form_street">
                  <span>Улица</span>
                  <input type="text" name="street" placeholder="Улица Мира 1">
              </label>
              <label class="Form_street">
              <span>Этаж</span>
              <input type="text" name="up" placeholder="1">
              </label>
              <label class="Form_street">
            <span>Подъезд</span>
            <input type="text" name="padik" placeholder="2">
            </label>
            <label class="Form_street">
              <span>Квартира</span>
              <input type="text" name="kv" placeholder="52">
            </label>
          </div>

              
              </label>
              <label class="date2">
                  <span>Дата доставки</span>
                  <input type="date" id="dateInput" name="date" min="{{ \Carbon\Carbon::today()->toDateString() }}"  />
                  <p id="availability" style="color: orange"></p>
                   
            
                  
              </label>  
              {{-- <form class="delivery"> --}}
                <label for="delivery-time" class="choosetimedel">Время доставки
                  <select class="ChooseDelivery" id="delivery-time"  name="time">
                    @foreach($time as $times)
                    <option value="{{$times->id}}">{{$times->time}}</option>
                    @endforeach
                    
                  </select>
                </label>
              
              {{-- </form> --}}
              
                </div>
              </div>

              {{--222--}}
              
              <label class="comment">
                  <span>Комментарий</span>
                  <textarea name="comment" cols="50" rows="5"  placeholder="Ваши пожелания к заказу, поменять цвет покрытия, изменить надпись, добавить рисунок"></textarea>
              </label>
              <label class="fotka">
                <span>Хотите прикрепить свой рисунок?</span>
                <input type="file" value="Картинка" name="Cakefoto">
              </label>
              
          </div>

          </div>

         </div> 
         @if(session('cart'))
            <div class="modal-footer">
              <div class="total">
                
                <tr>
                  {{-- <td><strong>Итог:</strong></td> --}}
                  <div id="total-price">Итого: 0 руб.</div>


                  {{-- <td>{{$totalPrice}} рублей</td>    --}}
                </tr>
                <button type="submit" class="btn btn-primary">Оформить заказ</button>
              <input type="checkbox" required> Нажимая на кнопку, вы даете согласие <a href="{{route('politics')}}" style="color: rgb(160, 37, 172)"> на обработку своих персональных данных и подтверждаете, что ознакомлены с публичной офертой и пользовательским соглашением</a>
  
                @endif

                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red">{{ $error }}</li>
                @endforeach
                @endif

              </div>
          </div>
        </div>
      </div>

   
  </div>

</form>



@include('footer')