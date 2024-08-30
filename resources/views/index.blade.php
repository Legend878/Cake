@include ('header')
<body>

    <main>
        <div class="news">
            <div class="menu">
                <div class="menu_dropdown">
                  <div class ="oneblock"> 
                   <a href="#">Всё</a>
                    <a href="#">День Рождение</a>
                    <a href="#">Свадьба</a>
                    <a href="#">С 8 марта</a>
                    <a href="#">С 23 февраля</a>
                    <a href="#">Для неё</a>
                  </div>
                  <div class="dvablock">
                    <a href="#">Для него</a>
                    <a href="#">Для Мамы</a>
                    <a href="#">Для Папы</a>
                    <a href="#">Отношения</a>
                    <a href="#">Детям</a>
                    <a href="#">Аниме</a>
                    <a href="#">Мемы</a>
                  </div>

             </div>

            </div>
            <div class="anime">
                    
                <img src="img/anime.gif"> 
            </div>
            
        
           
            {{-- <style>
               
        
                .menu_dropdown {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Автоматическое создание колонок */
                    gap: 15px; /* Пробел между элементами */
                }
        
                .menu_dropdown a {
                    background-color: #ffffff;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    padding: 10px;
                    text-align: center;
                    text-decoration: none;
                    color: #333;
                    transition: background-color 0.3s, transform 0.3s;
                }
        
                .menu_dropdown a:hover {
                    background-color: #e90a5f; /* Цвет фона при наведении */
                    color: #ffffff; /* Цвет текста при наведении */
                    transform: scale(1.05); /* Увеличение при наведении */
                }
        
                @media (max-width: 768px) {
                    .menu_dropdown {
                        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); /* Уменьшение минимальной ширины колонок на экранах меньше 768px */
                    }
                }
        
                @media (max-width: 480px) {
                    .menu_dropdown {
                        grid-template-columns: repeat(auto-fit, minmax(100%, 1fr)); /* Занимать 100% ширины на экранах меньше 480px */
                    }
                }
            </style>
             --}}


              <style>
     

        .menu_dropdown {
            
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap; /* Позволяет элементам переноситься на новую строку */
            justify-content: space-between; /* Распределяет элементы по горизонтали */
            /* gap: 15px; Пробел между элементами */
        }
        .oneblock{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;

        }
        .oneblock{
            font-size: 9px;
        }
        .dvablock{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;

        }
        .dvablock a {
            font-size: 9px;
        }


        .menu_dropdown a {
            /* background-color: #ffffff; */
            border: 1px solid #ddd;
            border-radius: 30px;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            /* color: #333; */
            transition: background-color 0.3s, transform 0.3s;
            /* flex: 1 1 calc(30% - 10px); Занимает 30% ширины с учетом отступов */
            min-width: 120px; /* Минимальная ширина ссылки */
            max-width: 200px; Максимальная ширина ссылки
            position: relative; /* Для абсолютного позиционирования псевдоэлементов */
            overflow: hidden; /* Скрывает содержимое, выходящее за пределы */
            flex: 1 1 auto; /* Элементы могут уменьшаться и расти */
            min-width: 80px; /* Минимальная ширина ссылки */
            max-width: 200px; /* Максимальная ширина ссылки */
            white-space: nowrap; /* Запрет на перенос текста */
            overflow: hidden; /* Скрывает переполнение */
            text-overflow: ellipsis; /* Добавляет многоточие для длинного текста */
        }

        .menu_dropdown a:hover {
            background-color:rgb(236, 103, 230); /* Цвет фона при наведении */
            color: #ffffff; /* Цвет текста при наведении */
             transform: scale(1.05); /* Увеличение при наведении */
            border-radius: 30px;

        }

        /* Эффект случайного расположения */
        .menu_dropdown a:nth-child(odd) {
            /* transform: translateY(-5px); Сдвиг вверх для нечётных элементов */
        }

        .menu_dropdown a:nth-child(even) {
            /* transform: translateY(5px); Сдвиг вниз для чётных элементов */
        }

        @media (max-width: 768px) {
            .news{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 30px 15px;
                box-sizing: border-box;
                margin: 0 auto;
                width: 100%;
            }
                
            .menu_dropdown a {
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: space-between;
                font-size: 9px; 
               
        }

        @media (max-width: 480px) {
            .menu_dropdown a {
                min-width: 10px; /* Уменьшаем минимальную ширину на экранах меньше 480px */      
                flex-wrap: wrap; 
                padding: 2px;
                 }
        }
            </style> 

        </div>
   
        <div class="modalwindow">
            <div class="modalcontent"> 
              <div class="modal-header">
                <h2 id="caketitle"></h2>
              </div>
              <div class="conteiner-center">
                <div class="conteiner-left">
                <div class="imageCake">
              <img src="" class="modalimage">
            </div>
         


                </div>
            
            
        
                <div class="conteiner-right">
                <form action="{{route('basketAdd','')}}" method="POST" > 
                    @csrf 
                    <input type="hidden" id="productId" name="productId"> 
                    <fieldset class="titlecake">
                        <legend>Начинка:</legend>
                        <div class="nachinka">
                                <select class="ChooseDelivery" id="delivery-time">
                                    @foreach ($nachinka as $nachinkas)
                                  <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                                  @endforeach
                                  
                                </select>



                    
                            <!-- Добавьте другие начинки по желанию -->
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
                        <button type="submit" name="click_button[]" value="" >Заказать</button>
                    </div>
            </form>
            

                    
                </div>
             

              </div>
              <span class="closebutton">&times;</span>

            </div>
        </div>



    
        <div class="katalog">
            <div class = "name_lenta">
                <a href="#">Бенто торты</a>
            </div>
            <div class="scroll-arrows">
                <div class="scroll-arrow left-arrow"> <svg
                     xmlns="http://www.w3.org/2000/svg"
                      width="24"
                       height="24"
                        viewBox="0 0 24 24"
                         style="fill: rgb(255, 255, 255);">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
                </div>
                <div class="scroll-arrow right-arrow"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="24"
                     height="24"
                      viewBox="0 0 24 24"
                       style="fill: rgb(255, 255, 255);">
                   <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
               </svg> 
           </div>
            </div>
        
     
            <div class="lenta" >
                
                @foreach ($bento as $bentos)  
                <form action="{{route('basketAdd', $bentos->id)}}" method="POST">
                    @csrf                  
                
                <div class="cake_card">
                    <div class = "image">
                        <img src="{{asset('storage/'.$bentos->image)}}" class="imagi"> 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name">{{$bentos->name_cake}}</h2>    
                    </div>
                    <div class="button">
                    <span name = "price"  value="{{ $bentos->price }}">{{ $bentos->price }}</span>
                        <button type="submit"  id="modalInput"  data-id="{{ $bentos->id }}">В корзину</button>
                    </div>
                </div>
            </form>
                @endforeach
                
                        
            </div>
                

           

  
      
        
    
            
       
   
        
    <div class="katalog">
        <div class = "name_lenta">
            <a href="#">Муссовые торты</a>
        </div>
        <div class="lenta">
            
            @foreach ($myssovyi as $myssovyis)     
            <form action="{{route('basketAdd',$myssovyis)}}" method="POST">
                @csrf               
            
            <div class="cake_card">
                <div class = "image">
                    <img src="{{asset('storage/'.$myssovyis->image)}}" class="imagi"> 
                </div>
                <div class="info_cake">
                    <h2 name ="cake_name">{{$myssovyis->name_cake}}</h2>    
                </div>
                <div class="button">
                <span name = "price" value="{{ $myssovyis->price }}">{{ $myssovyis->price }}</span>
                    <button type="submit"  id="modalInput" readonly>В корзину</button>
                </div>
        
            </div>
        </form>
            @endforeach
           
            
        </div>

    </div>
        <div class="katalog">
            <div class = "name_lenta">
                <a href="#">Классические торты</a>
            </div>
            <div class="lenta">
              
                
                @foreach ($classic as $classics)   
                <form action="{{route('basketAdd',$classics)}}" method="POST">
                    @csrf                 
                
                <div class="cake_card">
                    <div class = "image">
                        <img src="{{asset('storage/'.$classics->image)}}" class="imagi"> 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name">{{$classics->name_cake}}</h2>    
                    </div>
                    <div class="button">
                    <span name = "price" value="{{ $classics->price }}">{{ $classics->price }}</span>
                        <button type="submit" id="modalInput" value="1" readonly>В корзину</button>
                    </div>
            
                </div>
            </form>
                @endforeach
               
            </div>

        </div>
        <div class="katalog">
            <div class = "name_lenta">
                <a href="#">Капкейки</a>
            </div>
            <div class="lenta">
               
                @foreach ($capcake as $capcakes)  
                <form action="{{route('basketAdd',$capcakes)}}" method="POST">
                    @csrf                  
                
                <div class="cake_card">
                    <div class = "image">
                        <img src="{{asset('storage/'.$capcakes->image)}}" class="imagi"> 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name">{{$capcakes->name_cake}}</h2>    
                    </div>
                    <div class="button">
                    <span name = "price" value="{{ $capcakes->price }}">{{ $capcakes->price }}</span>
                        <button type="submit"  id="modalInput" value="1" readonly>В корзину</button>
                    </div>
            
                </div>
            </form>
                @endforeach
              
                
    
            </div>

        </div>
        
         
    </main>
    
</body>  
@include ('footer')
