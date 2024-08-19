@include ('header')
<body>

    <main>
        <div class="news">
            <div class="menu">
                <div class="menu_dropdown">
                    <a href="#">Всё</a>
                    <a href="#">День Рождение</a>
                    <a href="#">Свадьба</a>
                    <a href="#">С 8 марта</a>
                    <a href="#">С 23 февраля</a>
                    <a href="#">Для неё</a>
                    <a href="#">Для него</a>
                    <a href="#">Для Мамы</a>
                    <a href="#">Для Папы</a>
                    <a href="#">Отношения</a>
                    <a href="#">Детям</a>
                    <a href="#">Аниме</a>
                    <a href="#">Мемы</a>

             </div>

            </div>
            <div class="anime">
                    
                <img src="img/anime.gif"> 
            </div>
            
        
           
          
            
            
            

            
            
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
                    <fieldset class="titlecake">
                        <legend>Начинка:</legend>
                        <div class="nachinka">
                            <input type="radio" name="filling" value="Малина" required> Малина
                            <input type="radio" name="filling" value="Клубника" required> Клубника
                            <input type="radio" name="filling" value="Шоколад" required> Шоколад
                            <!-- Добавьте другие начинки по желанию -->
                        </div>
                        <legend>Количество</legend>
                        <select size="1" id="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <div class="infocakecardmodal">
                            <span>Цена: <span id="priceDisplay"></span></span> <!-- Отображение цены -->
                        </div>
              </fieldset>
              <div class="button">
                        <button type="submit" name="click_button[]" value="" >Заказать</button>
                    </div>
            

                    
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
                        <button type="submit"  id="modalInput" >В корзину</button>
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
                    <button type="submit"  id="modalInput" value="1" readonly>В корзину</button>
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
