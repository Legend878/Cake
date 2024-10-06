@include ('header')
    <main>
        {{-- <div class="about">
            <h1>О нас</h1>
            <div class="text">
                <h2>Добро пожаловать в кондитерскую "Натали"!</h2> <br>
                <h2>Почему выбирают нас?</h2><br>
                <ul>
                    <li> 🍰 <b>Качество и свежесть:</b> Мы стремимся к идеальному сочетанию великолепного вкуса и высочайшего качества каждого нашего изделия. Все тортики готовятся с любовью и заботой из натуральных ингредиентов. </li> <br>
                    <li> 🍰 <b>Уникальный дизайн:</b> Наши кондитеры - настоящие мастера своего дела, способные превратить обычный торт в настоящий произведение искусства. Мы готовы воплотить в жизнь даже самые экстравагантные идеи.</li><br>
                    <li> 🍰 <b>Доставка в удобное время: </b>Мы понимаем, что важно получить свой заказ вовремя. Мы гарантируем быструю и надежную доставку, чтобы удовлетворить самые взыскательные запросы.</li><br>
                    <li> 🍰 <b>Индивидуальный подход:</b> Мы ценим каждого нашего клиента и готовы предложить индивидуальные решения и персонализированный сервис для удовлетворения всех ваших пожеланий.</li><br>

                </ul><br><br>
                <img src="img/eat.gif"> 
                
                <br><br>
               
                <h2><u> Все изделия из натуральных продуктов, мы категорически против стабилизаторов, консервантов и порошковых смесей! </u>
                    
                    <br><br>

                    Мы вкладываем в свои десерты частичку себя, очень люблим свое дело и люблим радовать людей. У нас вы всегда найдёте вкусные и оригинальные десерты. </h2>
                
            </div>
        </div> --}}
        <section id="cakes">
            <h2>Торты</h2>
            <p>Наши торты - это настоящие произведения искусства. Мы используем только свежие ингредиенты и уникальные рецепты, чтобы создать неповторимый вкус.</p>
            <img src="cakes.jpg" alt="Торты" class="dessert-image">
        </section>

        <section id="cupcakes">
            <h2>Капкейки</h2>
            <p>Капкейки - это маленькие радости, которые можно взять с собой. Мы предлагаем разнообразные вкусы и декорируем их с любовью.</p>
            <img src="cupcakes.jpg" alt="Капкейки" class="dessert-image">
        </section>

        <section id="mousse">
            <h2>Муссовые торты</h2>
            <p>Наши муссовые торты - это легкие и воздушные десерты, которые тают во рту. Идеальны для любого праздника!</p>
            <img src="mousse.jpg" alt="Муссовые торты" class="dessert-image">
        </section>

        <section id="classic">
            <h2>Классические торты</h2>
            <p>Классические торты - это традиционные рецепты, которые знакомы каждому. Мы готовим их с душой и уважением к классике.</p>
            <img src="classic.jpg" alt="Классические торты" class="dessert-image">
        </section>

        <section id="contact">
            <h2>Контакты</h2>
            <p>Если у вас есть вопросы или вы хотите сделать заказ, свяжитесь с нами:</p>
            <p>Email: support@example.com</p>
            <p>Телефон: +7 (123) 456-78-90</p>
        </section>
    </main>

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

.dessert-image {
    width: 100%;
    height: auto;
    border-radius: 5px;
}


    </style>
    <script>
        // Пример простого скрипта для анимации при прокрутке
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');
    
    const options = {
        root: null,
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, options);

    sections.forEach(section => {
        observer.observe(section);
    });
});
    </script>
    

  
    
</body>
@include ('footer')

