<div class="mbp_pagination mt20">
    <ul class="page_navigation">
        <li class="page-item {{$pagination->previousPageUrl()? '':'disabled'}}">
            <a class="page-link" href="{{$pagination->previousPageUrl()}}"> <span class="flaticon-left-arrow"></span></a>
        </li>
        @for($i = 0, $page = 1; $i < $pagination->total(); $page++ , $i += $pagination->perPage())
            <li class="page-item {{$pagination->currentPage() == $page? 'active ':''}}"><a class="page-link" href="{{$pagination->url($page)}}">{{$page}}</a></li>
            @endfor
            <li class="page-item {{$pagination->nextPageUrl()? '':'disabled'}}">
                <a class="page-link" href="{{$pagination->nextPageUrl()}}"><span class="flaticon-right-arrow"></span></a>
            </li>
    </ul>
</div>
