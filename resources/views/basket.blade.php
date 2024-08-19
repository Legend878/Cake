@include('header')

<form class="obrabotka" action="{{route('pay'), $totalPrice}}"  method="post" enctype="multipart/form-data">
    <div id="cart-modal" class="modal">
      @csrf
       {{--обьеним 2 блока--}}
         <div class="modal-content"> {{-- первый блок корзины с товаррами --}}
          <div class ="trubleblock">
          <div class="doubleblock">
          <div class="block_header">
            <div class="modal-header">
              <h2>Корзина</h2>
            </div>
            <div class="modal-body">
              @if(session('cart'))
              <table class="ordershow">
                  <thead class="ordertablehead">
                      <tr>
                          <th colspan="2" class="orderinfo">Название</th>
                          <th class="orderinfo">Количество</th>
                          <th class="orderinfo">Цена</th>
                      </tr>
                  </thead>
                  <tbody class="ordertablebody">
                      @foreach(session('cart') as $id => $item)
                          <tr>
                            <td><img src="{{asset('storage/'.$item['image'])}}" style="width: 50px; height: auto;"></td>
                              <td>{{ $item['name_cake'] }}</td>
                              <td>{{ $item['quantity'] }}</td>
                              <td>{{ $item['price'] }} руб.</td>

                            </tr>
                      @endforeach
                    
                  </tbody>
                  
                    
                 
              </table>
               @else
              <p>Ваша корзина пуста.</p>
               @endif

          
        

            </div>
          </div>

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
                  <input type="text" name="name"   autocomplete="username" autofocus >
                </label>
                <label class="form_users" >
                  <span>Контактный номер телефона</span>
                  <input type="tel" name="number_phone" value ="+7" placeholder="+7 999 999 99 99"   autocomplete />
              </label>
                

                </div>
                <div class="client_connection">

                  <label class="form_users">
                    <span>Ваша Фамилия</span>
                    <input type="text" name="lastname"  autocomplete="username" autofocus >
                    </label>
            <label class="form_users">
                <span>Ваш Email</span>
                <input type="Email" name="Email" placeholder="Natale@mail.ru" autocomplete>
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
                  <input id="{{$deliveries->id}}" type="radio" name="delivery"  checked > 
                  <label for="{{$deliveries->id}}">{{$deliveries->type_del}}</label>
                  @endforeach
                </div>
                <div class="client_delivery">

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
              
              </label>
              <label class="date2">
                  <span>Дата доставки</span>
                  <input type="date" name="date2" />
              </label>  
              <form class="delivery">
                <label for="delivery-time">Время доставки / Самовывоза
                  <select class="ChooseDelivery" id="delivery-time">
                    @foreach($time as $times)
                    <option value="{{$times->id}}" name="Time">{{$times->time}}</option>
                    @endforeach
                    
                  </select>
                </label>
                
              </form>
              
              </div>
                </div>
              </div>

              {{--222--}}
              
               {{-- t.UkYs6EaOKyFErY6I-eKMpUxlGHT1SV_jFKes0ZXbLYpJa5TYvek18bKsKSO0x_jXObo0s5HjbWLNq1zC1R4dCQ --}}
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

            <div class="modal-footer">
              <div class="total">
                @if(session('cart'))
                <tr>
                  <td>Итог</td>

                  <td>{{$totalPrice}}</td>   
                  {{-- <td>{{$item['price'] * $item['quantity'] }}</td>  --}}
                </tr>
                <input type="hidden" name="frame" value="true">
              <button type="submit" class="btn btn-primary">Оформить заказ</button>
                @endif

              </div>
              
              {{-- <form action="{{route('pay')}}" method="POST"> --}}
                {{-- @csrf --}}
                 {{-- <input type="hidden" name="TerminalKey" value="1722688466757DEMO">  Эта штука не так важно --}}
                {{-- <label for="amount">Сумма (в рублях):</label>  --}}
                {{--  <input type="number" name="amount" id="amount" min="1" required>      это получается полная сумма которая total            --}}
                {{-- <input type="hidden" name="OrderId" value="123456"> --}}
                {{-- <input type="hidden" name="Description" value="Описание платежа">  --}}
                {{-- <input type="email" name="Email" value="user@example.com">
                <input type="phone" name="Phone" value="89012345678">
                <input type="hidden" name="Name" value="Имя покупателя">  --}}
                {{-- <input type="hidden" name="frame" value="true"> <!-- Убедитесь, что значение true -->
                <button type="submit">Оплатить</button> --}}
            {{-- </form> --}}
          </div>
        </div>
      </div>

   
  </div>

</form>

@include('footer')