  document.querySelector('.left-arrow').addEventListener('click', function() {
    document.querySelector('.scroll-content').scrollBy({
      left: -300, // Ширина прокрутки
      behavior: 'smooth'
    });
  });
  
  document.querySelector('.right-arrow').addEventListener('click', function() {
    document.querySelector('.scroll-content').scrollBy({
      left: 300, // Ширина прокрутки
      behavior: 'smooth'
    });
  });
  // Перемещение элементов для создания бесконечного эффекта


// // Получить элементы
// const cartLink = document.getElementById('cart-link');
// const cartModal = document.getElementById('cart-modal');
// const closeButton = document.querySelector('.close');

// // Открыть модальное окно при нажатии на ссылку
// cartLink.addEventListener('click', () => {
//   //if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
//    // window.location.href = 'zakaz.html'; // Перенаправить на страницу оформления заказа
//  // } else {
//     cartModal.style.display = 'block'; // Отобразить модальное окно
//  // }
// });

// // Закрыть модальное окно при нажатии на кнопку закрытия
// closeButton.addEventListener('click', () => {
//   cartModal.style.display = 'none';
// });

// // Закрыть модальное окно при нажатии на любую область вне модального окна
// window.addEventListener('click', (event) => {
//   if (event.target === cartModal) {
//     cartModal.style.display = 'none';
//   }
// });

// // Обработка выбранного времени доставки
// const selectElement = document.getElementById('delivery-time');

// selectElement.addEventListener('change', (event) => {
//   const selectedTime = event.target.value;
//   // Здесь вы можете обработать выбранное время.
// });

const productImages = document.querySelectorAll('.imagi');
const modalWindow = document.querySelector('.modalwindow');
const modalImage = document.querySelector('.modalimage');
const closeButton = document.querySelector('.closebutton');
const cakeTitle = document.getElementById('caketitle');
const modalInput = document.getElementById("modalInput");
const priceDisplay = document.getElementById('priceDisplay');

// Обработчик для изображений продуктов
productImages.forEach(image => {
  image.addEventListener('click', () => {
      modalWindow.style.display = 'flex';
      modalImage.src = image.src;

      // Получаем название и цену продукта
      const cakeCard = image.closest('.cake_card');
      const title = cakeCard.querySelector('h2[name="cake_name"]').innerText;
      const price = cakeCard.querySelector('span[name="price"]').innerText;

      // Устанавливаем название и цену в модальном окне
      cakeTitle.innerText = title;
      priceDisplay.innerText = price; // Устанавливаем цену в модальном окне
  });
});

// Закрытие модального окна
closeButton.addEventListener('click', () => {
  modalWindow.style.display = 'none';
});

// Закрытие модального окна при клике вне его
window.addEventListener('click', (event) => {
  if (event.target === modalWindow) {
      modalWindow.style.display = 'none';
  }
});

