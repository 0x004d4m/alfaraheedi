
@if ($paginator->hasPages())
    <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
                <ul class="pager">

                    @if ($paginator->onFirstPage())
                        <li><span>&lt;</span></li>
                    @else
                        <li class="active"><a href="{{ $paginator->previousPageUrl() }}#content">&lt;</a></li>
                    @endif



                    @foreach ($elements as $element)

                        @if (is_string($element))
                            <li><span>{{ $element }}</span></li>
                        @endif



                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}#content">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach



                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}#content">&gt;</a></li>
                    @else
                        <li class="active"><span>&gt;</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
