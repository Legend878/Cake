@include ('header')
<body>
    <main class ="orderwindow">
        <div class="conteinerzakazov">
        
        
<div id="orderDetailsModal" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close" onclick="closeModalOrder()">&times;</span>
        <h2>Информация о заказе</h2>
        <img id="modalImage" src="" alt="Изображение заказа" style="width: 100%; max-width: 300px; margin-bottom: 10px; display: none;"> 
        <p id="noImageMessage" style="display: none; color: red;">Изображение отсутствует.</p> 
        <p id="modalUserName"></p>
        <p id="modalUserEmail"></p>
        <p id="modalDeliveryType"></p>
        <p id="modalDeliveryTime"></p>
        <p id="modalUserComment"></p>
        <p id="modalUserPhone"></p>
    </div>
</div>
        
            <h2>Заказы подтвержденные</h2>

            @if($sortedGroupedConfirmOrders->isEmpty())
                <p>Нет заказов на подтверждение.</p>
            @else
                @foreach($sortedGroupedConfirmOrders as $key => $orders)
                    @php
                        list($file_user, $comment, $delivery, $time_id, $status, $dateUser, $userId, $date) = explode('|', $key);
                    @endphp
                    
                    <div class="order-info">
                        <h4>Заказ пользователя #{{ $userId }} на {{$dateUser}}</h4> 
                        
                        <div class="order">    
                            @if($status == 'CONFIRMED')  
                                <div class="status_circle_confirmed">
                                    <div class="circle_confirmed"></div>
                                    <p>Оплачен</p>
                                </div>
                            @endif           
                            
                            @foreach($orders as $order)        
                                <ul>
                                    <li>
                                        Товар: {{ $order->orderUser->product->name_cake }} 
                                        (Размер: {{ $order->orderUser->size }}) 
                                        (Количество: {{ $order->orderUser->quantity }}) 
                                        (Начинка: {{ $order->orderUser->nachinka_id }})


                                </ul>
                                
                        </div>
            
                        <button type="button" onclick="showOrderDetails(
                            '{{ optional($order->orderUser->user)->First_name }}',
                            '{{ optional($order->orderUser->user)->email }}', 
                            '{{ optional($order->orderUser->Delivery)->type_del }}',
                            '{{ optional($order->orderUser->time)->time }}', 
                            '{{ addslashes(optional($order->orderUser)->comment) }}', 
                            '{{ optional($order->orderUser)->user->number_phone }}',
                            '{{ asset('storage/' . $order->orderUser->file_user) }}' 

                        )">
                            Подробнее
                        </button>
                        @endforeach


                    </div>
                @endforeach
            @endif
            
            {{ $confirmOrders->links() }}
        </div>
    </main>
</body>
             
@include('footer')



