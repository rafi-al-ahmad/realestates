<a 
    @if($type === "button")
    type="button" 
    onclick="{{$action}}"
    @else
    href="{{$action}}"
    @endif
    class="btn btn-{{$btnType}} m-1 px-3 py-1 shadow-card {{$class}}" 
    title="{{__($title)}}" 
    style="margin: 0px;"
    row-id="{{ $rowId }}"
    id="{{$id}}"
>
    <i class="{{$icon}}"></i>
</a>