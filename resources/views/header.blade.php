
<!DOCTYPE html>
<html lang="rus">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>


    <title></title>
</head>
<body>
    <header>

        <a href="{{route('home')}}" class="logo">
            <img src="../img/logotype7.png">
		</a>
    
                <nav class="header_links">
                    @if(auth()->guard('admin')->check()) 
                    <a href="{{ route('Create') }}">Создание торта</a>
                    <a href="{{route('admin')}}">Мои заказы</a>
                    <a href="#">Все товары</a>
                    <a href="#">Статистика</a>
                    <form class="button" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button  type="submit">Выход</button>
                    </form>
                    @else
                    <a href ="{{route('home')}}">Главная</a>
                    <div class="header_links_dropdown">
                        <a href ="{{route('catalog')}}">Каталог <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAANZJREFUSEvt081pAlEUhuFHsIcEVBJMmggi9mEDggXYRlZu3KWUECRN+I+C6SGIHBhBYmbmuhBczF0O33zvOe/Mrbnxqd24XwUoNVwpun9FI3zgJ2fUB/TxnrdK0UceYow5etj9KWngEy8YYPIfpAjwiC+8Yo3OGSTKp3jCDF3srwVEPiDfeD6DxPNT+QpveeURTLkHzUxFG0vU0cIiU7ct+pVSAPF+QEJXbBInJg8theWpG5wGDEjo+k0tvxYQ+djggE3pDcsCqYpS+y5yFaBUXaWoVNERTkIfGckggW4AAAAASUVORK5CYII="/> </a>
                        <div class="header_links_dropdown_items">
                            <div class="header_links_dropdown_items-con">
                                <a href ="#">Бенто Торты</a>
                                <a href ="#">Классические Торты</a>
                                <a href ="#">Муссовые торты</a>
                                <a href ="#">Капкейки</a>
                                
                            </div>
                        </div>
                    </div>
                    <a href ="">Контакты</a>
                    <a href = "{{route('delivery')}}">Оплата и Доставка</a>
                    <a href ="{{route('about')}}">О Нас</a>
                    <a href ="{{route('question')}}">FAQ</a>
                    
                </nav>
                
                    <div class="info">
                        <div class="phone">
                            <svg xmlns="http://www.w3.org/2000/svg"
                             width="20"
                              height="20"
                               viewBox="0 0 24 24"
                                style="fill: rgba(0, 0, 0, 1)">
                                <path d="M20 10.999h2C22 5.869 18.127 2 12.99 2v2C17.052 4 20 6.943 20 10.999z"></path>
                                <path d="M13 8c2.103 0 3 .897 3 3h2c0-3.225-1.775-5-5-5v2zm3.422 5.443a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a1 1 0 0 0-.086-1.391l-4.064-3.696z"></path>
                            </svg>
                            <span>+7(911) 508-20-90</span>
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
                    <span class="City">Вологда</span>
                </div>
                       
        
                <div class="header_logo">
                    <img src="../img/kuromi.gif"/>
                </div>
                <div class="items">
                    <div class ="basket">
                    <a href="{{route('basket')}}"  id="cart-link" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
                        <path d="m21.706 5.291-2.999-2.998A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.291A.994.994 0 0 0 2 5.999V19c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5.999a.994.994 0 0 0-.294-.708zM6.414 4h11.172l.999.999H5.415L6.414 4zM4 19V6.999h16L20.002 19H4z"></path>
                        <path d="M15 12H9v-2H7v4h10v-4h-2z"></path>
                    </svg> Корзина</a>
                    </div>
                <div class="drop-menu">

                    <img id="openModal" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJjb2xvcjojMDAwMDAwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJoLWZ1bGwgdy1mdWxsIj48cmVjdCB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgcng9IjMwIiBmaWxsPSJ0cmFuc3BhcmVudCIgc3Ryb2tlPSJ0cmFuc3BhcmVudCIgc3Ryb2tlLXdpZHRoPSIwIiBzdHJva2Utb3BhY2l0eT0iMTAwJSIgcGFpbnQtb3JkZXI9InN0cm9rZSI+PC9yZWN0Pjxzdmcgd2lkdGg9IjI1NnB4IiBoZWlnaHQ9IjI1NnB4IiB2aWV3Qm94PSIwIDAgMTYgMTYiIGZpbGw9IiMwMDAwMDAiIHg9IjEyOCIgeT0iMTI4IiByb2xlPSJpbWciIHN0eWxlPSJkaXNwbGF5OmlubGluZS1ibG9jazt2ZXJ0aWNhbC1hbGlnbjptaWRkbGUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0iYmxhY2siPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iY3VycmVudENvbG9yIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS13aWR0aD0iMS41IiBkPSJNMi43NSAxMi4yNWgxMC41bS0xMC41LTRoMTAuNW0tMTAuNS00aDEwLjUiPjwvcGF0aD48L2c+PC9zdmc+PC9zdmc+" alt="menu-hamburger" style="color:#000000" />

</head>
<body>



<div id="menu-modal" class="menu-modal">
    <div class="menu-modal-header">
        <span class="close" id="closeModal">&times;</span>
        <h2>Меню</h2>
    </div>
    <div class="modal-content">
        <a href="{{route('basket')}}"  id="cart-link">Корзина</a>
        <a href ="">Контакты</a>
        <a href = "{{route('delivery')}}">Оплата и Доставка</a>
        <a href ="{{route('about')}}">О Нас</a>
        <a href ="{{route('question')}}">FAQ</a>
    </div>
</div>

                </div>
                @endif

    

            
            
        </div>
    </header>