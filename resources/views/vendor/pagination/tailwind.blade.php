@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="blog-pagination justify-content-center d-flex">
        <div class="flex justify-between flex-1 sm:hidden">
            <ul class="pagination">

                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                            <span class="lnr lnr-chevron-left">
                                {!! __('pagination.previous') !!}
                            </span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $paginator->previousPageUrl() }}" class="page-link">
                            {!! __('pagination.previous') !!}
                        </a>
                    </li>
                @endif

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $paginator->nextPageUrl() }}" class="page-link">
                            {!! __('pagination.next') !!}
                        </a>
                    </li>

                    @else
                    <a href="#" class="page-link" aria-label="Next">
                        <span class="lnr lnr-chevron-right">
                            {!! __('pagination.next') !!}
                        </span>
                    </a>
                @endif
            </ul>
        </div>
    </nav>
@endif
