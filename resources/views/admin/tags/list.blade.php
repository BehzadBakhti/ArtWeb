
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>
                Tag
                </th>
                <th>
                Editing
                </th>
                <th>
                Deleting
                </th>
            </thead>
            <tbody>
            @foreach($tags as $tag)
            
                <tr>
                    <td>
                    {{$tag->tag}}
                    </td>
                    <td>
                         <a href="{{route('tag.edit', ['id'=>$tag->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                         
                    </td>
                    <td>
                    <a href="{{route('tag.delete', ['id'=>$tag->id]) }}" class="btn btn-danger btn-sm">
                            Delete
                         </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
</div>