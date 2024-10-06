@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }
    
    .pagination a,
    .pagination span {
        display: inline-block; /* Убедитесь, что элементы отображаются как блочные */
        width: 40px; /* Фиксированная ширина для всех кнопок */
        padding: 10px; /* Удаляем отдельные значения для отступов */
        margin: 0 5px;
        border: 1px solid #ccc;
        text-decoration: none;
        color: #333;
        border-radius: 4px; /* Добавляем радиус для закругления углов */
        text-align: center; /* Центрируем текст */
        transition: background-color 0.3s; /* Плавный переход для фона */
    }
    
    .pagination a:hover {
        background-color: #f70fff; /* Цвет фона при наведении */
        color: white; /* Цвет текста при наведении */
    }
    
    .pagination .current {
        padding: 10px; /* Удаляем отдельные значения для отступов */
        margin: 0 5px;
        border: 1px solid #f70fff; /* Цвет рамки для текущей страницы */
        background-color: #f70fff; /* Цвет фона для текущей страницы */
        color: white; /* Цвет текста для текущей страницы */
    }
    
    .pagination .disabled {
      
        color: #aaa;
    }
    </style>