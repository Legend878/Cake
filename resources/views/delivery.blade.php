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

<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closePaymentModal">&times;</span>
        <h2>Информация об оплате</h2>
        <p>Мы принимаем все основные способы оплаты, включая карты и электронные кошельки. Если у вас есть вопросы, не стесняйтесь обращаться к нам.</p>
    </div>
</div>

     

    </main>
</body>
@include ('footer')
