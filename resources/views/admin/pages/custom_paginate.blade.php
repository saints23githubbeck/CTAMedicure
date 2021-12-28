@if ($paginator->hasPages())
    <ul class="pagination offset-lg-5 mt-2">

        @if ($paginator->onFirstPage())
            <li><span>← Previous</span></li>
        @else
            <li><a  href="{{ $paginator->previousPageUrl() }}">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class=" m-3 btn medibg text-white disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="m-3 btn medibg text-white active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li class=" m-3 "><a class=" btn medibg text-white" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class=" disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif