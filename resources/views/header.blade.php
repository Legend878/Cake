
<!DOCTYPE html>
<html lang="rus">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="{{asset('script.js')}}" defer></script>
    
    <meta name="description" content="{{ $page_description }}">
    <meta name="description" content="Заказывайте вкусные торты и капкейки от NATALIE в Вологде! Уникальные бенто торты и изделия под заказ для вашего праздника.">
    Торты на заказ в Город - NAME
    <title>{{ $page_title }}</title>

    @if (!$is_home)
        <meta name="robots" content="noindex">
    @endif
</head>
<body>
    <header>

        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('img/logotype7.png')}}">
		</a>

        @if(auth()->guard('admin')->check()) 
        <nav class="header_links">
            <a href="{{ route('Create') }}">Создание торта</a>
            <a href="{{route('confirmed')}}" >В Работе</a>
            <a href="{{route('admin')}}">Мои заказы</a>
            <a href="{{route('allproductAdmin')}}">Все товары</a>
            <a href="#">Статистика</a>
            <form class="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button  type="submit">Выход</button>
            </form>
        </nav>


        <div class="drop-menu">

            <img id="openModal" src="{{asset('img/hamburger-menu.png')}}"/>

                
<div id="menu-modal" class="menu-modal">
<div class="menu-modal-header">
    <span class="close" id="closeModal">&times;</span>
    <h2>Меню</h2>
</div>

<div class="modal-content-menu">
    <a href="{{ route('Create') }}">Создание торта</a>
    <a href="{{route('admin')}}">Мои заказы</a>
    <a href="{{route('confirmed')}}" >В Работе</a>
    <a href="{{route('allproductAdmin')}}">Все товары</a>
    <a href="#">Статистика</a>
    <form class="logout-menu" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button  type="submit">Выход</button>
    </form>
</div>
</div>
@else
    
                <nav class="header_links">
                    <a href ="{{route('home')}}">Главная</a>
                    <div class="header_links_dropdown">
                        <a href ="{{route('catalog')}}">Каталог</a>
                        <div class="header_links_dropdown_items">
                            <div class="header_links_dropdown_items-con">
                                <a href ="#">Бенто Торты</a>
                                <a href ="#">Классические Торты</a>
                                <a href ="#">Муссовые торты</a>
                                <a href ="#">Капкейки</a>
                                
                            </div>
                        </div>
                    </div>
                    <a href ="{{route('contakt')}}">Контакты</a>
                    <a href = "{{route('delivery')}}">Оплата и Доставка</a>
                    <a href ="{{route('about')}}">О Нас</a>
                    <a href ="{{route('question')}}">FAQ</a>
                    
                </nav>
              
                
                    <div class="info">
                        <div class="phone">
                            <span>+7(999) 999-99-99</span>
                        </div>
                    
                        
                        <P class="work">с 9:00 до 21:00</P>
                        
                    </div>
                    <div class="navigator">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    width="20"
                     height="20" 
                     viewBox="0 0 24 24"
                      style="fill: rgba(0, 0, 0, 1)">
                      <path d="M2.002 9.538c-.023.411.207.794.581.966l7.504 3.442 3.442 7.503c.164.356.52.583.909.583l.057-.002a1 1 0 0 0 .894-.686l5.595-17.032c.117-.358.023-.753-.243-1.02s-.66-.358-1.02-.243L2.688 8.645a.997.997 0 0 0-.686.893z"></path>
                    </svg>
                    <span class="City">Город</span>
                </div>
                       
        
                <div class="header_logo">
                    <img src="{{asset('img/kuromi.gif')}}">

                </div>
                <div class="items">
                    <div class ="basket">
                    <a href="{{route('basket')}}"  id="cart-link" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
                        <path d="m21.706 5.291-2.999-2.998A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.291A.994.994 0 0 0 2 5.999V19c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5.999a.994.994 0 0 0-.294-.708zM6.414 4h11.172l.999.999H5.415L6.414 4zM4 19V6.999h16L20.002 19H4z"></path>
                        <path d="M15 12H9v-2H7v4h10v-4h-2z"></path>
                    </svg> Корзина</a>
                    </div>
                </div>


                <div class="drop-menu">

                <img id="openModal" src="{{asset('img/hamburger-menu.png')}}"/>

                    
<div id="menu-modal" class="menu-modal">
    <div class="menu-modal-header">
        <span class="close" id="closeModal">&times;</span>
        <h2>Меню</h2>
    </div>
    
    <div class="modal-content">
        <a href="{{route('home')}}">Главная</a>
        <a href="{{route('basket')}}"  id="cart-link">Корзина</a>
        <a href="{{route('catalog')}}">Каталог</a>
        <a href ="{{route('contakt')}}">Контакты</a>
        <a href = "{{route('delivery')}}">Оплата и Доставка</a>
        <a href ="{{route('about')}}">О Нас</a>
        <a href ="{{route('question')}}">FAQ</a>

    </div>
    
    <div class="menuinfo">
        <div class="menunumber">
            <svg xmlns="http://www.w3.org/2000/svg"
             width="20"
              height="20"
               viewBox="0 0 24 24"
                style="fill: rgba(0, 0, 0, 1)">
                <path d="M20 10.999h2C22 5.869 18.127 2 12.99 2v2C17.052 4 20 6.943 20 10.999z"></path>
                <path d="M13 8c2.103 0 3 .897 3 3h2c0-3.225-1.775-5-5-5v2zm3.422 5.443a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a1 1 0 0 0-.086-1.391l-4.064-3.696z"></path>
            </svg>
            <span>+7(999) 999-99-99</span>
        </div>
    
        
        <P class="menuwork">с 9:00 до 21:00</P>
        
    </div>
</div>
                </div>

                @endif

                
</header>
<body>