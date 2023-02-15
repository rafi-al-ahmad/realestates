<div class="terms_condition_widget">
    <h4 class="title">{{__('Categories Property')}}</h4>
    <div class="widget_list">
        <ul class="list_details">
            @foreach($categories as $category)
            <li><a href="#"><i class="fa fa-caret-right mr10"></i>{{$category->title}} <span class="float-right">{{__(":num properties", ["num" => count($category->properties)])}}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>