
<div class="p-3">
    <div class="panel-body rtl">
        <table class="table table-hover">

            <thead>
                <th>
                Category Name
                </th>
                <th>
                Parent
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
                    {{($category->parent_id==0||$category->parent_id==null)?'-':$category->parent->name}}
                    </td>

                    <td>
                         <a href="{{route('prod_cat.edit', ['id'=>$category->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                         
                    </td>
                    <td>
                        <a href="{{route('prod_cat.delete', ['id'=>$category->id]) }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
</div>