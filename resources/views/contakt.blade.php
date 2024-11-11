@include ('header')
<body>
    <main>
        <div class="container-kontakt">
            <h1 class="text-center-kontakt">Свяжитесь с нами</h1>
            <div class="row mt-5-kontakt justify-content-center">
                <div class="col-md-8-kontakt">
                    <div class="contact-info-kontakt" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <h2 class="header-kontakt">Контактная информация</h2>
                        <p><strong>Адрес:</strong> г. Город, улица Улица дом 00</p>
                        <p><strong>Телефон:</strong> +7(999) 999 99 99 </p>
                        <p><strong>Email:</strong> example@yandex.ru</p>
                    </div>
                </div>
            </div>
        
            <div class="row mt-5-kontakt justify-content-center">
                <div class="col-md-8-kontakt">
                    <div class="map-kontakt" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                        <h2 class="header-kontakt">Наше местоположение</h2>
                        <iframe src="https://yandex.ru/map-widget/v1/-/CDXs6Z-x" width="100%" height="400" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
        <style>
            .container-kontakt {
                margin-top: 50px;
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            .text-center-kontakt {
                margin-bottom: 30px;
                font-size: 36px;
                color: #333;
            }
            .header-kontakt {
                margin-bottom: 20px;
                font-size: 28px;
                color: #555;
            }
            p {
                font-size: 16px;
                line-height: 1.5;
            }
        </style>
@include ('footer')


