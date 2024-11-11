
  <footer>
    <div class="footer-row">
    <a href="index.php" class="logo">
        <img src="{{asset('img/logotype6.png')}}">
    </a>
    <div class="footer-container">
        <div class="col">

           
        </div>
        <div class="col">
            <h4>Контакты</h4>
            <ul>
                <li>ИП Иванов Иван Иванович</li>
                <li>ОГРН/ОГРНИП 00000000000000</li>
                <li>ИНН 00000000000</li>
                <li>Адрес: г.Город улица Улица дом 00</li>
                <li>Телефон: +7 (999) 999 99 99 </li>
                <li>Сотрудничество / Предложения Email: <a href="mailto:example@yandex.ru">example@yandex.ru</a></li>
            </ul>
        </div>
        <div class="col">
            <h4>Социальные сети</h4>
            <ul>
                <li><a href="{{route('status')}}">Телеграмм</a></li>
                <li><a href="#">WhatsApp</a></li>
            </ul>
        </div>

        <div class="col">
          <h4><a href="{{route('login')}}">Администрация</a></h4>

        </div>
       
    </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; {{ date('Y') }} - Все права защищены</span>
  </div>
 
</footer>

  </html>