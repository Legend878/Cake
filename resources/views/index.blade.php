@include ('header')
<body>

    <main>
        @if(auth()->guard('admin')->check()) 
        @else


        <div class="news">
            <div class="menu">
                <div class="menu_dropdown">
                    <div class="oneblock">
                        <form class="form-oneblock" action="{{route('tags')}}" method="POST">
                            @csrf
                        @foreach($tags as $index => $tag)
                            @if ($index < 6 ) 
                                <button type="submit" name="tag"value="{{$tag->id}}">{{ $tag->type_tags }} </button>
                            @endif
                        @endforeach
                        <form>
                    </div>
                
                    <div class="dvablock">
                        <form class="form-dvablock" action="{{route('tags')}}" method="POST">
                            @csrf
                        @foreach($tags as $index => $tag)
                            @if ($index >= 6) 
                            <button type="submit" name="tag" value="{{$tag->id}}">{{ $tag->type_tags }} </button>
                            @endif
                        @endforeach
                        </form>
                    </div>
             </div>

            </div>
            <div class="anime">
                    
                <img src="img/anime.gif"> 
            </div>
            
            @endif
           

        </div>
   
      


    
        <div class="katalog">
            <div class = "name_lenta">
                <a href="{{route('bentos')}}">Бенто торты</a>
            </div>
            
            </div>
        
     
            <div class="lenta" >
                
                 @foreach ($bento as $bentos)  
                    @csrf                  
                <div class="cake_card">
                    <div class = "image" >
                        <img src="{{asset('storage/'.$bentos->image)}}" class="imagi" > 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name" class="cake_name">{{$bentos->name_cake}}</h2>    
                    </div>
                    <input type="hidden" name="ID" class="product-id" value="{{ $bentos->id }}"> 
                    <input type="hidden" name="category_id" class="category-id" value="{{ $bentos->category_id }}"> 
                    <div class="button">
                    <span name = "price" class="price"  value="{{ (int)$bentos->price }}">{{ (int)$bentos->price }} &#8381;</span>
                    </div>
                </div>
                @endforeach
               
                
                
            </div>
                

           

  
      
        
    
            
       
   
        
    <div class="katalog">
        <div class = "name_lenta">
            <a href="#">Муссовые торты</a>
        </div>
        <div class="lenta">
            
            @foreach ($myssovyi as $myssovyis)     
                @csrf               
            
                <div class="cake_card">
                    <div class="image" >
                        <img src="{{ asset('storage/'.$myssovyis->image) }}" class="imagi" > 
                    </div>
                    <div class="info_cake">
                        <h2 name="cake_name" class="cake_name">{{ $myssovyis->name_cake }}</h2>    
                    </div>
                    <input type="hidden" name="ID" class="product-id" value="{{ $myssovyis->id }}"> 
                    <input type="hidden" name="category_id" class="category-id" value="{{ $myssovyis->category_id }}"> 

                    <div class="button">
                        <span name="price" class="price" value="{{(int)$myssovyis->price}}">{{ (int)$myssovyis->price }} &#8381;</span>
                    </div>
                </div>
            @endforeach
           
            
        </div>

    </div>
        <div class="katalog">
            <div class = "name_lenta">
                <a href="{{route('classic')}}">Классические торты</a>
            </div>
            <div class="lenta">
              
                
                @foreach ($classic as $classics)   
                    @csrf                 
                <div class="cake_card">
                    <div class = "image">
                        <img src="{{asset('storage/'.$classics->image)}}" class="imagi" > 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name"  class="cake_name">{{$classics->name_cake}}</h2>    
                    </div>
                    <input type="hidden" name="ID" class="product-id" value="{{ $classics->id }}"> 
                    <input type="hidden" name="category_id" class="category-id" value="{{ $classics->category_id }}"> 
                    <div class="button">
                    <span name = "price" class="price" value="{{ (int)$classics->price }}">{{ (int)$classics->price }} &#8381;</span>
                    </div>
            
                </div>
                @endforeach
               
            </div>

        </div>
        <div class="katalog">
            <div class = "name_lenta">
                <a href="{{route('capcakes')}}">Капкейки</a>
            </div>
            <div class="lenta">
               
                @foreach ($capcake as $capcakes)  
                    @csrf                  
                <div class="cake_card">
                    <div class = "image">
                        <img src="{{asset('storage/'.$capcakes->image)}}" class="imagi"> 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name" class="cake_name">{{$capcakes->name_cake}}</h2>    
                    </div>
                    <input type="hidden" name="ID" class="product-id" value="{{ $capcakes->id }}"> 
                    <input type="hidden" name="category_id" class="category-id" value="{{ $capcakes->category_id }}"> 
                    <div class="button">
                    <span name = "price"  class="price" value="{{ (int)$capcakes->price }}">{{ (int)$capcakes->price }} &#8381;</span>
                    </div>
            
                </div>
                @endforeach


               

              
                
    
            </div>

        </div>
        <div class="katalog">
            <div class = "name_lenta">
                <a href="{{route('pack')}}">Наборы</a>
            </div>
            <div class="lenta">
               
                @foreach ($packs as $pack)  
                    @csrf                  
                <div class="cake_card">
                    <div class = "image">
                        <img src="{{asset('storage/'.$pack->image)}}" class="imagi"> 
                    </div>
                    <div class="info_cake">
                        <h2 name ="cake_name" class="cake_name">{{$pack->name_cake}}</h2>    
                    </div>
                    <input type="hidden" name="ID" class="product-id" value="{{ $pack->id }}"> 
                    <input type="hidden" name="category_id" class="category-id" value="{{ $pack->category_id }}"> 
                    <div class="button">
                    <span name = "price"  class="price" value="{{ (int)$pack->price }}">{{ (int)$pack->price }} &#8381;</span>
                    </div>
            
                </div>
                @endforeach


               

              
                
    
            </div>

        </div>
        <div class="modalwindow" id="modal1" style="display: none">
            <div class="modalcontent"> 
              <div class="modal-header">
                <h2 id="caketitle1"> </h2>
              </div>
            <div class="conteiner-fullwindow">
              <div class="conteiner-center">
                <div class="conteiner-left">
                    <div class="imageCake">
                       <img src="" class="modalimage"  id="modalImage1" onclick="showFullImage(this.src)">
                    </div>
                </div>

                <div class="conteiner-right">
                <form class ="form-nachinka"action="{{route('addBasketBento')}}" method="POST" > 
                    @csrf
                    <input type="hidden" id="productId1" name="product_id" value=""> 
                    <input type="hidden" id="categoryId1"  value="">                      
                     <label class="select-nachinka">
                            <legend>Начинка:</legend>
                        <div class="nachinka">
                                <select class="ChooseDelivery" id="delivery-time" name="nachinka">
                                    @foreach ($nachinka as $nachinkas)
                                  <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                                  @endforeach
                                </select>
                        </div>
                        </label>
                        
                        <label class="select-nachinka">
                        
                            <legend>Количество</legend>
                               <select  id="quantity" name="quantity" >
                                    @for ($i = 1; $i <= 10; $i++)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                              </select>
                        </label>
                      
                        <label class="select-nachinka">
                            <p>Бенто-торт — идеальный подарок для одного или двоих человек.</p>
                        <label class="select-nachinka">
                        <div class="infocakecardmodal">
                            <span>Цена: <span id="priceDisplay1"></span></span> 
                            
                        </div>
                        </label>
              </fieldset>
                   <div class="button">
                        <button type="submit" >Заказать</button>
                    </div>
            </form>
        </div>

         </div> 
         <div class="ingrigient">
            <ul class="list-modal">
                {{-- <li class="faq-modal">
                    <div class="question">
                        Состав
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        Выберите понравившийся товар из каталога и добавьте его в корзину. В корзине укажите ваши данные, а также выберите способ доставки и заполните оставшиеся поля. Оплатите товар удобным для вас способом и ожидайте статуса заказа на эл.почту, также мы можем вам позвонить для уточнения заказа.                    
                    </div>
                </li> --}}
                <li class="faq-modal">
                    <div class="question">
                        Начинки
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        <b>Манговая начинка</b> — это тропическая начинка, состоящая из натурального пюре спелых манг, которая в сочетании с ванильным бисквитом становится нежнее и ярче.
                        <br><br>
                        <b>Гранатовая начинка</b>  отличный вариант для тех, кто любит покислее. Дерзкая и пикантная. Она сочетает в себе сладость и кислинку, что создаёт интересное вкусовое сочетание. В сочетании с шоколадным бисквитом получается невероятно вкусной начинкой с терпкими нотками граната.
                        <br><br>
                        <b>Черный лес</b>  — классический представитель с совершенным сочетанием вкусов и ароматов. Вишневая начинка отлично дополняет нежный шоколадный бисквит, вкус у такой начинки приятный кисловато-сладкий.
                        <br><br>
                        <b>Сникерс</b>  — сладкий, роскошный представитель десертов. Удовлетворяющий даже самые тонкие вкусовые предпочтения. Соленая карамель в сочетании с арахисом и шоколадным бисквитом придает этой начинке запоминающий окрас и вкус.
                        <br><br>
                        <b>Черная смородина</b>  — вкус торта сочный и сладкий, сочетающийся с кислинкой черной смородины. Необыкновенный, благодаря освежающему вкусу и аромату этой ягоды. Никого не оставит равнодушным, пробуя торт с такой начинкой, невольно окунаешься в лето.
                    </div>
                </li>
               
            </ul>
         </div>
         
        </div> 

        <span class="closebutton" onclick="closeModal('modal1')">&times;</span>

            </div>
        </div> 



        
        <div id="full-screen-modal" class="fullscreen-modal" onclick="hideFullImage()">
            <span class="close-button">&times;</span>
            <img class="fullscreen-image" id="displayedImage">
        </div>


        <div class="modalwindow" id="modal2" style="display: none">
            <div class="modalcontent"> 
              <div class="modal-header">
                <h2 id="caketitle2"> </h2>
              </div>
            <div class="conteiner-fullwindow">
              <div class="conteiner-center">
                <div class="conteiner-left">
                    <div class="imageCake">
                       <img src="" class="modalimage"  id="modalImage2" onclick="showFullImage(this.src)">
                    </div>
                </div>

                <div class="conteiner-right">
                <form class ="form-nachinka"action="{{route('addBasketCake')}}" method="POST" > 
                    @csrf
                    <input type="hidden" id="productId2" name="product_id" value=""> 
                    <input type="hidden" id="categoryId2"  value="">                      
                     <label class="select-nachinka">
                            <legend>Начинка:</legend>
                        <div class="nachinka">
                                <select class="ChooseDelivery" id="delivery-time" name="nachinka">
                                    @foreach ($nachinka as $nachinkas)
                                  <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                                  @endforeach
                                </select>
                        </div>
                        </label>
                        <label class="select-nachinka">
                            <select  id="quantity" name="size" >
                                <option value="s">Маленький 1кг</option>
                            <option value="m">Средний 1,5кг</option>
                            <option value="x">Большой 2кг</option>

                            </select>
                        </label>
                        <label class="select-nachinka">
                        
                            <legend>Количество</legend>
                               <select  id="quantity" name="quantity" >
                                    @for ($i = 1; $i <= 10; $i++)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                              </select>
                        </label>
                      
                        <label class="select-nachinka">
                            <p>Классический торт радует своим вкусом и подходит для любого праздника.</p>
                        </label>
                        <label class="select-nachinka">
                        <div class="infocakecardmodal">
                            <span>Цена: <span id="priceDisplay2"></span></span> 
                            
                        </div>
                        </label>
              </fieldset>
                   <div class="button">
                        <button type="submit" >Заказать</button>
                    </div>
            </form>
        </div>

         </div> 
         <div class="ingrigient">
            <ul class="list-modal">
                {{-- <li class="faq-modal">
                    <div class="question">
                        Состав
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        Выберите понравившийся товар из каталога и добавьте его в корзину. В корзине укажите ваши данные, а также выберите способ доставки и заполните оставшиеся поля. Оплатите товар удобным для вас способом и ожидайте статуса заказа на эл.почту, также мы можем вам позвонить для уточнения заказа.                    
                    </div>
                </li> --}}
                <li class="faq-modal">
                    <div class="question">
                        Начинки
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        <b>Манговая начинка</b> — это тропическая начинка, состоящая из натурального пюре спелых манг, которая в сочетании с ванильным бисквитом становится нежнее и ярче.
                        <br><br>
                        <b>Гранатовая начинка</b>  отличный вариант для тех, кто любит покислее. Дерзкая и пикантная. Она сочетает в себе сладость и кислинку, что создаёт интересное вкусовое сочетание. В сочетании с шоколадным бисквитом получается невероятно вкусной начинкой с терпкими нотками граната.
                        <br><br>
                        <b>Черный лес</b>  — классический представитель с совершенным сочетанием вкусов и ароматов. Вишневая начинка отлично дополняет нежный шоколадный бисквит, вкус у такой начинки приятный кисловато-сладкий.
                        <br><br>
                        <b>Сникерс</b>  — сладкий, роскошный представитель десертов. Удовлетворяющий даже самые тонкие вкусовые предпочтения. Соленая карамель в сочетании с арахисом и шоколадным бисквитом придает этой начинке запоминающий окрас и вкус.
                        <br><br>
                        <b>Черная смородина</b>  — вкус торта сочный и сладкий, сочетающийся с кислинкой черной смородины. Необыкновенный, благодаря освежающему вкусу и аромату этой ягоды. Никого не оставит равнодушным, пробуя торт с такой начинкой, невольно окунаешься в лето.
                    </div>
                </li>
               
            </ul>
         </div>
         
        </div> 

        <span class="closebutton" onclick="closeModal('modal2')">&times;</span>

            </div>
        </div> 
        <div class="modalwindow" id="modal3" style="display: none">
            <div class="modalcontent"> 
              <div class="modal-header">
                <h2 id="caketitle3"> </h2>
              </div>
            <div class="conteiner-fullwindow">
              <div class="conteiner-center">
                <div class="conteiner-left">
                    <div class="imageCake">
                       <img src="" class="modalimage"  id="modalImage3" onclick="showFullImage(this.src)">
                    </div>
                </div>

                <div class="conteiner-right">
                <form class ="form-nachinka"action="{{route('addBasketCake')}}" method="POST" > 
                    @csrf
                    <input type="hidden" id="productId3" name="product_id" value=""> 
                    <input type="hidden" id="categoryId3"  value="">                      
                     <label class="select-nachinka">
                            <legend>Начинка:</legend>
                        <div class="nachinka">
                                <select class="ChooseDelivery" id="delivery-time" name="nachinka">
                                    @foreach ($nachinka as $nachinkas)
                                  <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                                  @endforeach
                                </select>
                        </div>
                        </label>
                        <label class="select-nachinka">
                            <select  id="quantity" name="size" >
                                <option value="s">Маленький 1кг</option>
                                <option value="m">Средний 1,5кг</option>
                                <option value="x">Большой 2кг</option>

                            </select>
                        </label>
                        <label class="select-nachinka">
                        
                            <legend>Количество</legend>
                               <select  id="quantity" name="quantity" >
                                    @for ($i = 1; $i <= 10; $i++)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                              </select>
                        </label>
                      
                        <label class="select-nachinka">
                            <p>Муссовый торт — легкий десерт с воздушной текстурой и насыщенным вкусом.</p>
                        </label>
                        <label class="select-nachinka">
                        <div class="infocakecardmodal">
                            <span >Цена: <span id="priceDisplay3"></span></span> 


                        </div>
                        </label>
              </fieldset>
                   <div class="button">
                        <button type="submit" >Заказать</button>
                    </div>
            </form>
        </div>

         </div> 
         {{-- center --}}
         <div class="ingrigient">
            <ul class="list-modal">
                {{-- <li class="faq-modal">
                    <div class="question">
                        Состав
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        Выберите понравившийся товар из каталога и добавьте его в корзину. В корзине укажите ваши данные, а также выберите способ доставки и заполните оставшиеся поля. Оплатите товар удобным для вас способом и ожидайте статуса заказа на эл.почту, также мы можем вам позвонить для уточнения заказа.                    
                    </div>
                </li> --}}
                <li class="faq-modal">
                    <div class="question">
                        Начинки
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        <b>Манговая начинка</b> — это тропическая начинка, состоящая из натурального пюре спелых манг, которая в сочетании с ванильным бисквитом становится нежнее и ярче.
                        <br><br>
                        <b>Гранатовая начинка</b>  отличный вариант для тех, кто любит покислее. Дерзкая и пикантная. Она сочетает в себе сладость и кислинку, что создаёт интересное вкусовое сочетание. В сочетании с шоколадным бисквитом получается невероятно вкусной начинкой с терпкими нотками граната.
                        <br><br>
                        <b>Черный лес</b>  — классический представитель с совершенным сочетанием вкусов и ароматов. Вишневая начинка отлично дополняет нежный шоколадный бисквит, вкус у такой начинки приятный кисловато-сладкий.
                        <br><br>
                        <b>Сникерс</b>  — сладкий, роскошный представитель десертов. Удовлетворяющий даже самые тонкие вкусовые предпочтения. Соленая карамель в сочетании с арахисом и шоколадным бисквитом придает этой начинке запоминающий окрас и вкус.
                        <br><br>
                        <b>Черная смородина</b>  — вкус торта сочный и сладкий, сочетающийся с кислинкой черной смородины. Необыкновенный, благодаря освежающему вкусу и аромату этой ягоды. Никого не оставит равнодушным, пробуя торт с такой начинкой, невольно окунаешься в лето.
                    </div>
                </li>
               
            </ul>
         </div>
         
        </div> 

        <span class="closebutton" onclick="closeModal('modal3')">&times;</span>

            </div>
        </div> 
        <div class="modalwindow" id="modal4" style="display: none">
            <div class="modalcontent"> 
              <div class="modal-header">
                <h2 id="caketitle4"> </h2>
              </div>
            <div class="conteiner-fullwindow">
              <div class="conteiner-center">
                <div class="conteiner-left">
                    <div class="imageCake">
                       <img src="" class="modalimage"  id="modalImage4" onclick="showFullImage(this.src)">
                    </div>
                </div>

                <div class="conteiner-right">
                <form class ="form-nachinka"action="{{route('addBasketCapcakes')}}" method="POST" > 
                    @csrf
                    <input type="hidden" id="productId4" name="product_id" value=""> 
                    <input type="hidden" id="categoryId4"  value="">                
                     <label class="select-nachinka">
                            <legend>Начинка:</legend>
                        <div class="nachinka">
                                <select class="ChooseDelivery" id="delivery-time" name="nachinka">
                                    @foreach ($nachinka as $nachinkas)
                                  <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                                  @endforeach
                                </select>
                        </div>
                        </label>
                        <label class="select-nachinka">
                            <div id="specialOffer" style="display:none;">
                                <p>Граммовки</p>
                            </div>
                        </label>
                        <label class="select-nachinka">
                        
                            <legend>Количество</legend>
                               <select  id="quantity" name="quantity" >
                                    @for ($i = 4; $i <= 16; $i++)
                                       @if($i % 2 == 0)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                      @endif
                                    @endfor
                              </select>
                        </label>
                      
                        <label class="select-nachinka">
                            <p>Капкейк — маленький, но очень вкусный десерт, идеально подходит для праздников.</p>
                        </label>
                        <label class="select-nachinka">
                        <div class="infocakecardmodal">
                            <span>Цена: <span id="priceDisplay4"></span></span> 
                            
                        </div>
                        </label>
              </fieldset>
                   <div class="button">
                        <button type="submit" >Заказать</button>
                    </div>
            </form>
        </div>

         </div> 
         <div class="ingrigient">
            <ul class="list-modal">
                {{-- <li class="faq-modal">
                    <div class="question">
                        Состав
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        Выберите понравившийся товар из каталога и добавьте его в корзину. В корзине укажите ваши данные, а также выберите способ доставки и заполните оставшиеся поля. Оплатите товар удобным для вас способом и ожидайте статуса заказа на эл.почту, также мы можем вам позвонить для уточнения заказа.                    
                    </div>
                </li> --}}
                <li class="faq-modal">
                    <div class="question">
                        Начинки
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        <b>Манговая начинка</b> — это тропическая начинка, состоящая из натурального пюре спелых манг, которая в сочетании с ванильным бисквитом становится нежнее и ярче.
                        <br><br>
                        <b>Гранатовая начинка</b>  отличный вариант для тех, кто любит покислее. Дерзкая и пикантная. Она сочетает в себе сладость и кислинку, что создаёт интересное вкусовое сочетание. В сочетании с шоколадным бисквитом получается невероятно вкусной начинкой с терпкими нотками граната.
                        <br><br>
                        <b>Черный лес</b>  — классический представитель с совершенным сочетанием вкусов и ароматов. Вишневая начинка отлично дополняет нежный шоколадный бисквит, вкус у такой начинки приятный кисловато-сладкий.
                        <br><br>
                        <b>Сникерс</b>  — сладкий, роскошный представитель десертов. Удовлетворяющий даже самые тонкие вкусовые предпочтения. Соленая карамель в сочетании с арахисом и шоколадным бисквитом придает этой начинке запоминающий окрас и вкус.
                        <br><br>
                        <b>Черная смородина</b>  — вкус торта сочный и сладкий, сочетающийся с кислинкой черной смородины. Необыкновенный, благодаря освежающему вкусу и аромату этой ягоды. Никого не оставит равнодушным, пробуя торт с такой начинкой, невольно окунаешься в лето.
                    </div>
                </li>
               
            </ul>
         </div>
         
        </div> 
        <span class="closebutton" onclick="closeModal('modal4')">&times;</span>

            </div>
        </div> 
        

        <div class="modalwindow" id="modal5" style="display: none">
            <div class="modalcontent"> 
              <div class="modal-header">
                <h2 id="caketitle5"> </h2>
              </div>
            <div class="conteiner-fullwindow">
              <div class="conteiner-center">
                <div class="conteiner-left">
                    <div class="imageCake">
                       <img src="" class="modalimage"  id="modalImage5" onclick="showFullImage(this.src)">
                    </div>
                </div>

                <div class="conteiner-right">
                <form class ="form-nachinka"action="{{route('addBasketCapcakes')}}" method="POST" > 
                    @csrf
                    <input type="hidden" id="productId5" name="product_id" value=""> 
                    <input type="hidden" id="categoryId5"  value="">                   
                     <label class="select-nachinka">
                            <legend>Начинка:</legend>
                        <div class="nachinka">
                                <select class="ChooseDelivery" id="delivery-time" name="nachinka">
                                    @foreach ($nachinka as $nachinkas)
                                  <option value="{{$nachinkas->type_nachinka}}">{{$nachinkas->type_nachinka}}</option>
                                  @endforeach
                                </select>
                        </div>
                        </label>
                        
                        <label class="select-nachinka">
                        
                            <legend>Количество</legend>
                               <select  id="quantity" name="quantity" >
                                    @for ($i = 1; $i <= 10; $i++)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                              </select>
                        </label>
                      
                        <label class="select-nachinka">
                            <p>Набор (Бенто торт + Капкейки): Набор включает бенто-торт и капкейк для сладкого удовольствия.</p>
                        </label>
                        <label class="select-nachinka">
                        <div class="infocakecardmodal">
                            <span>Цена: <span id="priceDisplay5"></span></span> 
                            
                        </div>
                        </label>
              </fieldset>
                   <div class="button">
                        <button type="submit" >Заказать</button>
                    </div>
            </form>
        </div>

         </div> 
         <div class="ingrigient">
            <ul class="list-modal">
                <li class="faq-modal">
                    {{-- <div class="question">
                        Состав
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        Выберите понравившийся товар из каталога и добавьте его в корзину. В корзине укажите ваши данные, а также выберите способ доставки и заполните оставшиеся поля. Оплатите товар удобным для вас способом и ожидайте статуса заказа на эл.почту, также мы можем вам позвонить для уточнения заказа.                    
                    </div>
                </li> --}}
                <li class="faq-modal">
                    <div class="question">
                        Начинки
                        <span class="icon-main">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </div>
                    <div class="answer">
                        <b>Манговая начинка</b> — это тропическая начинка, состоящая из натурального пюре спелых манг, которая в сочетании с ванильным бисквитом становится нежнее и ярче.
                        <br><br>
                        <b>Гранатовая начинка</b>  отличный вариант для тех, кто любит покислее. Дерзкая и пикантная. Она сочетает в себе сладость и кислинку, что создаёт интересное вкусовое сочетание. В сочетании с шоколадным бисквитом получается невероятно вкусной начинкой с терпкими нотками граната.
                        <br><br>
                        <b>Черный лес</b>  — классический представитель с совершенным сочетанием вкусов и ароматов. Вишневая начинка отлично дополняет нежный шоколадный бисквит, вкус у такой начинки приятный кисловато-сладкий.
                        <br><br>
                        <b>Сникерс</b>  — сладкий, роскошный представитель десертов. Удовлетворяющий даже самые тонкие вкусовые предпочтения. Соленая карамель в сочетании с арахисом и шоколадным бисквитом придает этой начинке запоминающий окрас и вкус.
                        <br><br>
                        <b>Черная смородина</b>  — вкус торта сочный и сладкий, сочетающийся с кислинкой черной смородины. Необыкновенный, благодаря освежающему вкусу и аромату этой ягоды. Никого не оставит равнодушным, пробуя торт с такой начинкой, невольно окунаешься в лето.
                    </div>
                </li>
               
            </ul>
         </div>
         
        </div> 

        <span class="closebutton" onclick="closeModal('modal5')">&times;</span>

            </div>
        </div> 
        




         
    </main>
<div id="cookieConsent" class="cookie-consent">
    <div class="cookie-content">
        <p>Продолжая использование данного сайта, вы даете <a href="{{route('politics')}}">согласие на обработку данных cookies.</a></p>
        <button id="acceptCookies" class="cookie-button">Согласен</button>
    </div>
</div>
</body>  


@include ('footer')
