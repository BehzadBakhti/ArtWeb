@extends('admin.categories.create')


@section ('content')


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
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
</div>

@endSection 