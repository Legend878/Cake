
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
                <li>ИП Соколова Наталья Юрьевна</li>
                <li>ОГРН/ОГРНИП 324350000034591</li>
                <li>ИНН 352525202603</li>
                <li>Адрес: г.Вологда, улица Конева, дом 20</li>
                <li>Телефон: +7 (911) 508-20-90</li>
                <li>Сотрудничество / Предложения Email: <a href="mailto:NatalieCakeWork@yandex.ru">NatalieCakeWork@yandex.ru</a></li>
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