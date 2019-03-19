@extends('layouts.app')


@section ('content')

    @if(count(@errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <i class="list-group-item text-danger">
                {{$error}}
                </i>
            @endforeach
        </ul>
    @endif

<div class="panel panel-default">
    <div class="panel-heading">
         Create a New Category 
    </div>
    <div class="panel-body">
        <form action="{{ route('category.store') }}" method="post"  >
              {{ csrf_field() }}
              <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="name" class="form-control">
                </div>
               
               
                <div class="form-group">
                   <button type="submit" class="btn btn-success"> Save Category</button>
                </div>


        </form>
    </div>
</div>

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