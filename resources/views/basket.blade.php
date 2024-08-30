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
                  <input id="{{$deliveries->id}}" type="radio" name="delivery" value="{{$deliveries->type_del}}" onchange="updateText()"  @if($loop->first) checked @endif  > 
                  <label id="selected-delivery" for="{{$deliveries->id}}">{{$deliveries->type_del}}</label>
                  @endforeach
                </div>

                <style>
                  #delivery-info, #pickup-info {
                      display: none; /* Скрываем оба блока по умолчанию */
                  }
              </style>
                

<!-- Блок для самовывоза -->
<div id="pickup-info">
  {{-- <p>Информация о самовывоз!!!е.</p> --}}
  <label class="date2">
    <span>Дата самовывоза</span>
    <input type="date" name="date2" />
</label>  
{{-- <form class="delivery"> --}}
  <label for="delivery-time">Время самовывоза
    <select class="ChooseDelivery" id="delivery-time">
      @foreach($time as $times)
      <option value="{{$times->id}}" name="Time">{{$times->time}}</option>
      @endforeach
      
    </select>
  </label>
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
              
              </label>
              <label class="date2">
                  <span>Дата доставки</span>
                  <input type="date" name="date2" />
              </label>  
              {{-- <form class="delivery"> --}}
                <label for="delivery-time">Время доставки
                  <select class="ChooseDelivery" id="delivery-time">
                    @foreach($time as $times)
                    <option value="{{$times->id}}" name="Time">{{$times->time}}</option>
                    @endforeach
                    
                  </select>
                </label>
                
              {{-- </form> --}}
              
              </div>
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