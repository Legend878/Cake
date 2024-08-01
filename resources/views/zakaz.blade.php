@include ('header')
<body>
   
    <main>
        <div class="items">
            <a href="#"  id="cart-link"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
                <path d="m21.706 5.291-2.999-2.998A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.291A.994.994 0 0 0 2 5.999V19c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5.999a.994.994 0 0 0-.294-.708zM6.414 4h11.172l.999.999H5.415L6.414 4zM4 19V6.999h16L20.002 19H4z"></path>
                <path d="M15 12H9v-2H7v4h10v-4h-2z"></path>
            </svg> Корзина</a>
            <div id="cart-modal" class="modal">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Корзина</h2>
                  </div>
                  <div class="modal-body">
                    <!-- Содержимое корзины -->
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary">Оформить заказ</button>
                  </div>
                </div>
              </div>
    </main>
</body>
@include ('footer')
