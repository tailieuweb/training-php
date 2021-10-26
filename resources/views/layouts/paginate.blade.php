@if ($paginator->hasPages())
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <!-- Hiển thị chỗ này -->
        <!-- Link đến trang đầu tiên -->
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <!-- Nếu là trang đầu thì disable Previous -->
        <li class="page-item">
            <span class="page-link" aria-label="Previous">
                <i class="ti ti-angle-left"></i>
            </span>
        </li>
        @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-label="Previous">
                <i class="ti ti-angle-left"></i>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        <!-- Trang hiện tại -->
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <span class="page-link">{{ $page }}</span>
        </li>
        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
        <li class="page-item">
            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
        </li>
        @elseif ($page == $paginator->lastPage() - 1)
        <li class="page-item">
            <span class="page-link"><i class="ti ti-more"></i></span>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach
        <!-- Link đến trang cuối cùng -->
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="{{ __('pagination.next') }}">
                <i class="ti ti-angle-right"></i>
            </a>
        </li>
        @else
        <li class="page-item">
            <span class="page-link" aria-label="{{ __('pagination.next') }}">
                <i class="ti ti-angle-right"></i>
            </span>
        </li>
        @endif
    </ul>
</nav>
@endif