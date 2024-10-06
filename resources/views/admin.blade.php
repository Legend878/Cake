@include ('header')
<body>

    <main class ="orderwindow">
        <div class="conteinerzakazov">
            
        
            <h2>Заказы на подтверждение</h2>

            @if($groupedAuthorizedOrders->isEmpty())
                <p>Нет заказов на подтверждение.</p>
            @else
                @foreach($groupedAuthorizedOrders as $key => $orders)
                    @php
                        // Разделяем ключ на user_id и дату
                        // list($file_user, $comment, $delivery, $time_id, $status, $dateUser, $userId, $date) = explode('|', $key);
                        list($orderID_bank,$status,$date) = explode('|', $key);

                    @endphp
                    <div class="order-info">
                        <h4>Заказ пользователя #{{$orders->first()->orderUser->user->id}} на {{ $date }}</h4> <!-- Номер пользователя -->
                        <div class="order">
                            @if($status == 'AUTHORIZED')  
                                <div class="status_circle">
                                    <div class="circle"></div>
                                    <p>Ожидает</p>
                                </div>
                            @endif 
                                @foreach($orders as $order)        
                                    <li>
                                        Товар: {{ $order->orderUser->product->name_cake }} 
                                        (Размер: {{ $order->orderUser->size }}) 
                                        (Количество: {{ $order->orderUser->quantity }}) 
                                        (Начинка: {{ $order->orderUser->nachinka_id }})

                                    </li>
                                    {{-- {{$orderAddress = $order->orderUser->address}}; --}}
                                    @endforeach

                                    @if ($order->orderUser->address)    
                                        <p>ID адреса: {{$order->orderUser->address->id}}</p>
                                         <p>Улица: {{$order->orderUser->address->street}}</p>
                                         <p>Этаж: {{$order->orderUser->address->floor}}</p>
                                         <p>Подъезд: {{$order->orderUser->address->lobby}}</p>
                                        <p>Квартира: {{$order->orderUser->address->room}}</p>
                                     @else 
                                    <p>Адрес не найден.</p>
                                    @endif

                            </ul>
                        </div>
                       


                            {{-- Кнопки подтверждения и отклонения --}}
                            <div class="twobutton">
                                <form action="{{ route('confirm',$order->orderID_bank) }}" method="POST"> 
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $orders->first()->orderUser->user->email }}">

                                    <button type="submit" class="success">Подтвердить</button>
                                </form> 
                                <button type="button" onclick="showOrderDetails(
                                    '{{ $orders->first()->orderUser->file_user ? asset('storage/' . $orders->first()->orderUser->file_user) : '' }}',
                                    '{{ isset($orders->first()->orderUser->user) ? addslashes($orders->first()->orderUser->user->First_name) : '' }}',
                                    '{{ isset($orders->first()->orderUser->user) ? addslashes($orders->first()->orderUser->user->email) : '' }}', 
                                    '{{ isset($orders->first()->orderUser->Delivery) ? addslashes($orders->first()->orderUser->Delivery->type_del) : '' }}',
                                    '{{ isset($orders->first()->orderUser->time) ? addslashes($orders->first()->orderUser->time->time) : '' }}',
                                    '{{ addslashes($orders->first()->orderUser->comment ?? '') }}', 
                                    '{{ isset($orders->first()->orderUser->user) ? addslashes($orders->first()->orderUser->user->number_phone) : '' }}' <!-- Добавляем номер телефона -->
                                )">
                                    Подробнее
                                </button>
            
                                <form action="{{ route('reject',  $order->orderID_bank) }}" method="POST"> 
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $orders->first()->orderUser->user->email }}">
                                    <button type="submit" class="danger">Отклонить</button>
                                </form>
                            </div> <!-- Закрываем div order-info -->
                    </div>
                            @endforeach
                        @endif
                    
    </main>
</body>                        
            
            <!-- Модальное окно -->
            <div id="userModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:1000;">
                <div style="background-color:white; margin: 15% auto; padding: 20px; border-radius: 5px; width: 80%; max-width: 500px;">
                    <span onclick="document.getElementById('userModal').style.display='none'" style="cursor:pointer; float:right;">&times;</span>
                    <h2>Информация о пользователе</h2>
                    <img id="modalImage" style="width: 50px; margin-bottom: 10px;" src="" alt="Изображение пользователя">
                    <p id="modalName"></p>
                    <p id="modalEmail"></p>
                    <p id="modalPhone"></p>
                    <p id="modalDeliveryType"></p>
                    <p id="modalTime"></p>
                    <p id="modalComment"></p>
                </div>
            </div>
          
            {{ $authorizedOrders->links() }}
              

          
                 
@include('footer')



