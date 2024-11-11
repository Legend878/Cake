@include ('header')


    <main>
        <section id="delivery">
            <h2>Информация о доставке</h2>
            <p>Мы предлагаем быструю и надежную доставку по всей стране. Вы можете выбрать удобный способ доставки:</p>
            <ul>
                <li>Курьерская доставка</li>
                <li>Почта России</li>
                <li>Самовывоз из магазина</li>
            </ul>
            <button id="moreDelivery">Узнать больше</button>
        </section>

        <section id="payment">
            <h2>Способы оплаты</h2>
            <p>Мы принимаем различные способы оплаты для вашего удобства:</p>
            <ul>
                <li>Кредитные и дебетовые карты</li>
                <li>Электронные кошельки</li>
                <li>Наличный расчет</li>
            </ul>
            <button id="morePayment">Узнать больше</button>
        </section>

        <section id="contact">
            <h2>Контакты</h2>
            <p>Если у вас есть вопросы, свяжитесь с нами:</p>
            <p>Email: support@example.com</p>
            <p>Телефон: +7 (123) 456-78-90</p>
        </section>

        
<div id="deliveryModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeDeliveryModal">&times;</span>
        <h2>Информация о доставке</h2>
        <p>Мы предлагаем различные варианты доставки, включая курьерскую доставку и самовывоз. Для получения дополнительной информации, пожалуйста, свяжитесь с нашей службой поддержки.</p>
    </div>
</div>

<!-- Модальное окно для оплаты -->
<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closePaymentModal">&times;</span>
        <h2>Информация об оплате</h2>
        <p>Мы принимаем все основные способы оплаты, включая карты и электронные кошельки. Если у вас есть вопросы, не стесняйтесь обращаться к нам.</p>
    </div>
</div>

        <style>
            nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

main {
    padding: 20px;
}

section {
    background: #fff;
    margin: 20px 0;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

button {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background 0.3s;
}

button:hover {
    background: #0056b3;
}
.modal {
    display: none; /* Скрыто по умолчанию */
    position: fixed; /* Остается на месте */
    z-index: 1; /* На переднем плане */
    left: 0;
    top: 0;
    width: 100%; /* Полная ширина */
    height: 100%; /* Полная высота */
    overflow: auto; /* Включает прокрутку, если необходимо */
    background-color: rgb(0,0,0); /* Черный фон с прозрачностью */
    background-color: rgba(0,0,0,0.4); /* Черный фон с прозрачностью */
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% сверху и центрирование */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Ширина */
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

        </style>
        <script>
            // Получаем элементы модальных окон
var deliveryModal = document.getElementById('deliveryModal');
var paymentModal = document.getElementById('paymentModal');

// Получаем кнопки для открытия модальных окон
var moreDeliveryButton = document.getElementById('moreDelivery');
var morePaymentButton = document.getElementById('morePayment');

// Получаем элементы <span>, которые закрывают модальные окна
var closeDeliveryModal = document.getElementById('closeDeliveryModal');
var closePaymentModal = document.getElementById('closePaymentModal');

// Открытие модального окна для доставки
moreDeliveryButton.addEventListener('click', function() {
    deliveryModal.style.display = "flex";
});

// Открытие модального окна для оплаты
morePaymentButton.addEventListener('click', function() {
    paymentModal.style.display = "flex";
});

// Закрытие модального окна при нажатии на <span> (x)
closeDeliveryModal.addEventListener('click', function() {
    deliveryModal.style.display = "none";
});

closePaymentModal.addEventListener('click', function() {
    paymentModal.style.display = "none";
});

// Закрытие модального окна при нажатии вне его области
window.addEventListener('click', function(event) {
    if (event.target === deliveryModal) {
        deliveryModal.style.display = "none";
    }
    if (event.target === paymentModal) {
        paymentModal.style.display = "none";
    }
});
        </script>

    </main>
</body>
@include ('footer')
