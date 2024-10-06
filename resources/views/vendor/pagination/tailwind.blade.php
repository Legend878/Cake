<div class="pagination">
    @if ($paginator->hasPages())
        <nav>
            <div class="pagination-info">
                {!! __('Всего товаров') !!}
                @if ($paginator->firstItem())
                    {{ $paginator->firstItem() }}
                    {!! __('до') !!}
                    {{ $paginator->lastItem() }}
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('из') !!}
                {{ $paginator->total() }}
                {{-- {!! __('results') !!} --}}
            </div>
            <ul class="pagination-links">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li> <!-- Стрелка влево -->
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li> <!-- Стрелка влево -->
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li> <!-- Текущая страница -->
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li> <!-- Стрелка вправо -->
                @else
                    <li class="disabled"><span>&raquo;</span></li> <!-- Стрелка вправо -->
                @endif
            </ul>
        </nav>
    @endif
</div>
<style>
    .pagination {
        display: flex;
        justify-content: center; /* Центрируем элементы пагинации */
        margin: 20px 0; /* Отступы сверху и снизу */
    }
    
    .pagination-info {
        margin-right: 20px; /* Отступ между информацией и кнопками */
        align-self: center; /* Центрируем текст по вертикали */
    }
    
    .pagination-links {
        list-style-type: none; /* Убираем маркеры списка */
        padding: 0; /* Убираем отступы */
        display: flex; /* Используем flexbox для размещения кнопок */
        align-items: center
    }
    
    .pagination-links li {
        margin: 0 5px; /* Отступы между кнопками */
    }
    
    .pagination-links a,
    .pagination-links span {
        display: inline-block; /* Убедитесь, что элементы отображаются как блочные */
        width: 40px; /* Фиксированная ширина для всех кнопок */
        padding: 10px; /* Удаляем отдельные значения для отступов */
        border: 1px solid #ccc;
        text-decoration: none;
        margin: 0;
        color: #333;
        border-radius: 4px; /* Добавляем радиус для закругления углов */
        text-align: center; /* Центрируем текст */
        transition: background-color 0.3s; /* Плавный переход для фона */
    }
    
    .pagination-links a:hover {
        background-color: #f700ff; /* Цвет фона при наведении */
        color: white; /* Цвет текста при наведении */
    }
    
    .pagination-links .active span {
        padding: 10px; /* Удаляем отдельные значения для отступов */
        border: 1px solid #f700ff; /* Цвет рамки для текущей страницы */
        background-color: #f700ff; /* Цвет фона для текущей страницы */
        color: white; /* Цвет текста для текущей страницы */
    }
    
    .pagination-links .disabled {
      
        color: #aaa;
    }
    </style>