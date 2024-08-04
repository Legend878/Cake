@include('header')

<form class="obrabotka" action="{{route('ShowOrder')}}"  method="post" enctype="multipart/form-data">
  @csrf
    <div id="cart-modal" class="modal">
        <div class="modal-content" >
            <div class="modal-header">
              <span class="close">&times;</span>
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
                   <tfoot>
                    <tr>
                      <td>Итог</td>
                      <td>{{$totalPrice}}</td>  
                      <td>{{$item['price'] * $item['quantity'] }}</td> 
                    </tr>

                  </tfoot> 
              </table>
          @else
              <p>Ваша корзина пуста.</p>
          @endif

          
        

            </div>
            <div class="info_users">
              <label class="form_users">
                  <span>Ваше ФИО</span>
                  <input type="text" name="name" placeholder="Как к вам можно обращаться?"  autocomplete="username" autofocus >
              </label>
              <label class="form_users" >
                  <span>Контактный номер телефона</span>
                  <input type="tel" name="number_phone" value ="+7" placeholder="+7 999 999 99 99"   autocomplete />
              </label>
              <label class="form_users">
                  <span>Ваш Email</span>
                  <input type="Email" name="Email" placeholder="Natale@mail.ru" autocomplete>
              </label>
              <label class="Form_street">
                  <span>Ваш точный Адрес</span>
                  <input type="text" name="street" placeholder="Ул. Трехсвятская, дом 34, подьезд 1,этаж 1, кв 1">
              </label>
              
              </label>
              <label class="date2">
                  <span>Дата доставки</span>
                  <input type="date" name="date2" />
              </label>  
              <div class="form_radio_btn">
              <input id="radio-1" type="radio" name="radio" value="1" checked>
              <label for="radio-1">Самовывоз</label>
              <input id="radio-2" type="radio" name="radio" value="2" checked>
              <label for="radio-2">Доставка</label>
            </div>
              
              
              <form class="delivery">
                  <label for="delivery-time">Время доставки / Самовывоза</label>
                  <select class="ChooseDelivery" id="delivery-time">
                    <option value="09:00-11:00" name="delivery">09:00 - 11:00</option>
                    <option value="11:00-13:00" name="delivery">11:00 - 13:00</option>
                    <option value="13:00-15:00" name="delivery">13:00 - 15:00</option>
                    <option value="15:00-17:00" name="delivery">15:00 - 17:00</option>
                    <option value="15:00-17:00" name="delivery">17:00 - 19:00</option>
                    <option value="15:00-17:00" name="delivery">19:00 - 21:00</option>
                  </select>
                </form>
              <label class="comment">
                  <span>Комментарий</span>
                  <textarea name="comm" cols="50" rows="5"  placeholder="Ваши пожелания к заказу, поменять цвет покрытия, изменить надпись, добавить рисунок"></textarea>
              </label>
              <label class="fotka">
                <span>Хотите прикрепить свой рисунок?</span>
                <input type="file" value="Картинка" name="Cakefoto">

              </label>
            </div>
            <div class="modal-footer">
              {{-- <button type="submit" class="btn btn-primary">Оформить заказ</button> --}}
              <form action="/payment/initiate" method="POST">
                @csrf
                <button type="submit">Оплатить</button>
            </form>
            
            </div>
          </div>

   
  </div>

</form>

@include('footer')