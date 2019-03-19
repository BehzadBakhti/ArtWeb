@if(count(@errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <i class="list-group-item text-danger">
                {{$error}}
                </i>
            @endforeach
        </ul>
    @endif