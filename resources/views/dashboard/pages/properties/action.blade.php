<div class="demo-inline-spacing justify-content-around ">

    <x-dashboard.datatable.buttons.action-button
    btnType="light"
    action="{{route('properties.update', ['id' => $id])}}"
    icon="far fa-edit" />

    <x-dashboard.datatable.buttons.action-button
    btnType="danger"
    action="{{route('properties.delete', ['id' => $id])}}"
    icon="fa-regular fa-trash-can" />

</div>
