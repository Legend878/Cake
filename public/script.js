

document.querySelectorAll('.question').forEach(item => {
  item.addEventListener('click', () => {
      let answer = item.nextElementSibling;
      if (answer.style.maxHeight) {
          answer.style.maxHeight = null;
          item.querySelector('.icon-main i').classList.remove('fa-minus');
          item.querySelector('.icon-main i').classList.add('fa-plus');
      } else {
          answer.style.maxHeight = answer.scrollHeight + 'px';
          item.querySelector('.icon-main i').classList.remove('fa-plus');
          item.querySelector('.icon-main i').classList.add('fa-minus');
      }
  });
});
//AJAX
$('#dateInput').on('change', function() {
    var selectedDate = $(this).val(); // Получаем выбранную дату

    $.ajax({
        type: 'POST',
        url: '/checkAvailability',
        data: {
            date: selectedDate,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.available) {
                $('#availability').text('Места доступны');
            } else {
                $('#availability').text('Извините, мест нет на эту дату');
            }
        },
        error: function(xhr, status, error) {
            console.error('Ошибка:', error);
            console.error('Ответ сервера:', xhr.responseText);
            $('#availability').text('Произошла ошибка при проверке доступности');
        }
    });
});



$(document).ready(function() {
    $('#dateInput').on('change', function() {
        var selectedDate = $(this).val(); // Получаем выбранную дату
        var currentDateTime = new Date(); // Текущая дата и время
        var isToday = selectedDate === currentDateTime.toISOString().split('T')[0]; // Проверяем, выбрана ли сегодня дата

        // Добавляем 2 часа к текущему времени
        var minDeliveryTime = new Date(currentDateTime.getTime() + 2 * 60 * 60 * 1000); // 2 часа в миллисекундах

        // Получаем все опции времени доставки
        $('#delivery-time option').each(function() {
            var optionValue = parseInt($(this).val());
            var deliverySlotStartTime = new Date(selectedDate);
            deliverySlotStartTime.setHours(7 + optionValue * 2); // Начало времени доставки (08:00 + (value * 2) часов)

            if (isToday) {
                // Если сегодня, отключаем опции, которые меньше минимального времени
                if (deliverySlotStartTime < minDeliveryTime) {
                    $(this).prop('disabled', true); // Отключаем опцию
                } else {
                    $(this).prop('disabled', false); // Включаем опцию
                }
            } else {
                // Если выбрана другая дата, включаем все опции
                $(this).prop('disabled', false);
            }
        });
    });
});

$(document).ready(function() {
    // Функция для загрузки корзины при загрузке страницы
    fetchCart();

    function fetchCart() {
        $.ajax({
            type: 'GET',
            url: '/basket/cart', // Убедитесь, что этот маршрут настроен
            success: function(response) {
                updateTotalPrice(response.totalPrice); // Обновляем общую сумму
            },
            
        });
    }
});

    // Обработчик для кнопки "Доставка"
    $('#1').click(function() {
        $.ajax({
            type: 'POST',
            url: '/basket/delivery',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Получаем CSRF-токен
            },
            success: function(response) {
                updateTotalPrice(response.totalPrice); // Обновляем общую сумму
            },
            error: function(xhr) {
            }
        });
    });

    // Обработчик для кнопки "Самовывоз"
    $('#2').click(function() {
        $.ajax({
            type: 'POST',
            url: '/basket/remove',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Получаем CSRF-токен
            },
            success: function(response) {
                updateTotalPrice(response.totalPrice); // Обновляем общую сумму
            },
            error: function(xhr) {
            }
        });
    });

    // Функция для обновления строки доставки
    function updateDelivery(delivery) {
        if (delivery) {
            $('#delivery-row').html(`${delivery.name_cake}: ${delivery.price} руб.`);
            $('#delivery-row').show(); // Показываем строку доставки
        } else {
            $('#delivery-row').hide(); // Скрываем строку доставки, если её нет
        }
    }


    // Функция для обновления общей суммы на странице
    function updateTotalPrice(totalPrice) {
        if (totalPrice !== undefined && totalPrice !== null) {  // Проверка на undefined и null
            $('#total-price').html(`Итого: ${totalPrice} руб.`); // Обновляем общую сумму
        } else {
        }
    }
// Show modal window right

const modal = document.getElementById('menu-modal');
const openModal = document.getElementById('openModal');
const closeModal = document.getElementById('closeModal');

openModal.onclick = function() {
    modal.classList.add('active');
}

closeModal.onclick = function() {
    modal.classList.remove('active');
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.classList.remove('active');
    }
}

        

document.addEventListener('DOMContentLoaded', () => {
    const productImages = document.querySelectorAll('.imagi');

    // Объект для хранения модальных окон
    const modalWindows = {
        1: document.getElementById('modal1'),
        2: document.getElementById('modal2'),
        3: document.getElementById('modal3'),
        4: document.getElementById('modal4'),
        5: document.getElementById('modal5')

    };

    const closeButtons = document.querySelectorAll('.closebutton');
    const cakeTitle = document.getElementById('caketitle');
    const priceDisplay = document.getElementById('priceDisplay');
    const productIdInput = document.getElementById('productId'); // Скрытое поле для ID продукта
    const categoryIdInput = document.getElementById('categoryId'); // Скрытое поле для category_id

    productImages.forEach(image => {
        image.addEventListener('click', () => {
            const cakeCard = image.closest('.cake_card') || image.closest('.catalog-cake_card'); // Находим ближайшую карточку
            if (!cakeCard) return; // Проверка на наличие карточки

            // Извлекаем данные о продукте
            const productId = cakeCard.querySelector('.product-id').value; 
            const title = cakeCard.querySelector('.cake_name').innerText; // Извлечение названия
            const price = cakeCard.querySelector('.price').innerText; // Извлечение цены
            const categoryID = cakeCard.querySelector('.category-id').value; // Извлечение category_id
            
            // Устанавливаем данные в модальном окне
            document.getElementById(`caketitle${categoryID}`).innerText = title;
            document.getElementById(`priceDisplay${categoryID}`).innerText = price; 
            document.getElementById(`productId${categoryID}`).value = productId; 
            document.getElementById(`categoryId${categoryID}`).value = categoryID; 

       // Устанавливаем изображение в соответствующее модальное окно
            const modalImage = document.getElementById(`modalImage${categoryID}`);
            modalImage.src = image.src; // Устанавливаем изображение

            // Закрываем все модальные окна перед открытием нового
            closeAllModals();

            // Открываем нужное модальное окно в зависимости от категории
            if (modalWindows[categoryID]) {
                modalWindows[categoryID].style.display = 'flex';
            } else {
            }
        });
    });

    // Закрытие всех модальных окон
    function closeAllModals() {
        Object.values(modalWindows).forEach(modal => {
            modal.style.display = 'none';
        });
    }

    // Закрытие модального окна по кнопке закрытия
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            closeAllModals();
        });
    });

    // Закрытие модального окна при клике вне его
    window.addEventListener('click', (event) => {
        Object.values(modalWindows).forEach(modal => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
});

function updateText() {
  // Получаем все радио-кнопки с именем "delivery"
  const radios = document.getElementsByName('delivery');
  let selectedValue;

  // Ищем выбранную радио-кнопку
  for (const radio of radios) {
      if (radio.checked) {
          selectedValue = radio.value; // Получаем значение выбранной радио-кнопки
          break;
      }
  }


  // Управляем видимостью блоков
  const deliveryInfo = document.getElementById('delivery-info');
  const pickupInfo = document.getElementById('pickup-info');

  if (selectedValue === '1') {
      deliveryInfo.style.display = 'flex'; // Показываем блок с информацией о доставке
      pickupInfo.style.display = 'none'; // Скрываем блок с информацией о самовывозе
  } else if (selectedValue === '2') {
      deliveryInfo.style.display = 'none'; // Скрываем блок с информацией о доставке
      pickupInfo.style.display = 'flex'; // Показываем блок с информацией о самовывозе
  }
}

// Вызываем updateText при загрузке страницы, чтобы установить начальное значение
document.addEventListener('DOMContentLoaded', () => {
  updateText();
  document.querySelector('#delivery-info').style.display = 'flex'; // Показываем блок с информацией о доставке
});



//Show message cookies
function showCookieConsent() {
  const cookieConsent = document.getElementById('cookieConsent');
  // Проверяем, было ли согласие ранее
  if (!localStorage.getItem('cookiesAccepted')) {
      cookieConsent.style.display = 'block'; // Показываем модальное окно
  }
}

// For press botton  Accept
document.getElementById('acceptCookies').addEventListener('click', function() {
  const cookieConsent = document.getElementById('cookieConsent');
  cookieConsent.style.display = 'none'; // Скрываем модальное окно
  localStorage.setItem('cookiesAccepted', 'true'); // Сохраняем согласие в localStorage
});

// show mes about cookies for loading list
window.onload = function() {
  showCookieConsent();
};


const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');
const lenta = document.querySelector('.lenta');

leftArrow.addEventListener('click', () => {
    lenta.scrollBy({
        top: 0,
        left: -300, // Прокрутка влево на 300px
        behavior: 'smooth'
    });
});

rightArrow.addEventListener('click', () => {
    lenta.scrollBy({
        top: 0,
        left: 300, // Прокрутка вправо на 300px
        behavior: 'smooth'
    });
});
  

function showFullImage(src) {
    const modal = document.getElementById("full-screen-modal");
    const displayedImage = document.getElementById("displayedImage");
    
    modal.style.display = "block"; // Показываем модальное окно
    displayedImage.src = src; // Устанавливаем источник изображения
}

function hideFullImage() {
    const modal = document.getElementById("full-screen-modal");
    
    modal.style.display = "none"; // Скрываем модальное окно
}


function showOrderDetails(name, email, deliveryType, time, comment, phone, imageUrl) {
    document.getElementById('modalUserName').innerText = "Имя: " + name;
    document.getElementById('modalUserEmail').innerText = "Email: " + email;
    document.getElementById('modalDeliveryType').innerText = "Тип доставки: " + deliveryType;
    document.getElementById('modalDeliveryTime').innerText = "Время доставки: " + time;
    document.getElementById('modalUserComment').innerText = "Комментарий: " + comment;
    document.getElementById('modalUserPhone').innerText = "Телефон: " + phone;

    const modalImage = document.getElementById('modalImage');
    const noImageMessage = document.getElementById('noImageMessage');

    if (imageUrl) {
        modalImage.src = imageUrl; 
        modalImage.style.display = 'block'; 
        noImageMessage.style.display = 'none'; 
    } else {
        modalImage.style.display = 'none'; 
        noImageMessage.style.display = 'block'; 
    }

    // Показываем модальное окно
    document.getElementById('orderDetailsModal').style.display = 'block';
}

function closeModalOrder() {
    document.getElementById('orderDetailsModal').style.display = 'none';
    document.getElementById('noImageMessage').style.display = 'none'; 
}

window.onclick = function(event) {
    const modal = document.getElementById('orderDetailsModal');
    
    if (event.target === modal) {
        closeModalOrder();
    }
};

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});



//delivery

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



function showOrderDetails(imageUrl, name, email, deliveryType, time, comment, phone) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('modalName').innerText = "Имя: " + name;
    document.getElementById('modalEmail').innerText = "Email: " + email;
    document.getElementById('modalPhone').innerText = "Телефон: " + phone;
    document.getElementById('modalDeliveryType').innerText = "Тип доставки: " + deliveryType;
    document.getElementById('modalTime').innerText = "Время доставки: " + time;
    document.getElementById('modalComment').innerText = "Комментарий: " + comment;

    // Показываем модальное окно
    document.getElementById('userModal').style.display = 'block';
}