@if ($paginator->hasPages())
<nav>   
<ul class="pager">
       
        @if ($paginator->onFirstPage())
            <li class="wt-prevpage"><i class="lnr lnr-chevron-left"></i></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
           
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
        @else
           <li><span aria-hidden="true">&raquo;</span></li>
        @endif
    </ul>
    <nav>
@endif 
