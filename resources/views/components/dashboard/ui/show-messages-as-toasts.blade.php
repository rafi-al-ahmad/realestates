

<script>
    $(window).on('load', function() {
        @if(session()->has('errors'))
        @foreach (session('errors')->all() as $msg)
        toastr.error("{{ $msg }}");
        @endforeach
        {{session()->forget('errors')}}
        @endif
        @if(session()->has('info'))
        @if(is_array(session('info')))
        @foreach (session('info')->all() as $msg)
        toastr.info("{{ $msg }}");
        @endforeach
        @else
        toastr.info("{{ session('info') }}");
        @endif
        {{session()->forget('info')}}
        @endif
        @if(session()->has('success'))
        @if(is_array(session('success')))
        @foreach (session('success')->all() as $msg)
        toastr.success("{{ $msg }}");
        @endforeach
        @else
        toastr.success("{{ session('success') }}");
        @endif
        {{session()->forget('success')}}
        @endif
        @if(session()->has('warning'))
        @if(is_array(session('warning')))
        @foreach (session('warning')->all() as $msg)
        toastr.warning("{{ $msg }}");
        @endforeach
        @else
        toastr.warning("{{ session('warning') }}");
        @endif
        {{session()->forget('warning')}}
        @endif
    });
</script>
