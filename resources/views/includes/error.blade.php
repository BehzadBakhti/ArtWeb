@if(count(@errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <div class=" alert alert-danger">
                {{$error}}
                </div>
            @endforeach
        </ul>
    @endif