<div class="col col-12">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{alert($error, 'danger')}}
        @endforeach
    @endif
    @if(session('messages'))
        {{alert(session('messages'), 'success')}}
    @endif
    @if(session('success'))
        {{alert(session('success'), 'success')}}
    @endif
    @if(session('warning'))
        {{alert(session('warning'), 'warning')}}
    @endif
    @if(session('info'))
        {{alert(session('info'), 'info')}}
    @endif
</div>
