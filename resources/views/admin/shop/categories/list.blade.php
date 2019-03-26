
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>
                Category Name
                </th>
                <th>
                Editing
                </th>
                <th>
                Deleting
                </th>
            </thead>
            <tbody>
            @foreach($categories as $category)
            
                <tr>
                    <td>
                    {{$category->name}}
                    </td>
                    <td>
                         <a href="{{route('category.edit', ['id'=>$category->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                         
                    </td>
                    <td>
                    <a href="{{route('category.delete', ['id'=>$category->id]) }}" class="btn btn-danger btn-sm">
                            Delete
                         </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
</div>