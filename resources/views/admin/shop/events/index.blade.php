@extends('layouts.dashboard')


@section ('dashboadr_subpage')

 @include('includes.error')




<div class="panel panel-default">

<div class="panel-heading">
Event <a href="{{route('event.create')}}" class="btn btn-primary btn-sm my-2 mx-auto align-center">Add+</a>
</div>

    <div class="panel-body">
        <table class="table table-hover">

            <thead>
                <th>
                Title
                </th>
                <th>
                Is Active
                </th>
                <th>
                Editing
                </th>
                <th>
                Deleting
                </th>
            </thead>
            <tbody>
            @foreach($events as $event)
            
                <tr>
                    <td>
                    {{$event->event_title}}
                    </td>
                    <td>
                    {{$event->active==1? 'Yes' : 'No'}}
                    </td>
                    <td>
                         <a href="{{route('event.edit', ['id'=>$event->id]) }}" class="btn btn-primary btn-sm">
                            Edit
                         </a>
                         
                    </td>
                    <td>
                    <a href="{{route('event.delete', ['id'=>$event->id]) }}" class="btn btn-danger btn-sm">
                            Delete
                         </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
            
        </table>
    </div>
</div>

@endSection 