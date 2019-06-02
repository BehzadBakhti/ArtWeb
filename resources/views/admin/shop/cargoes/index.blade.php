@extends('layouts.dashboard')


@section ('dashboadr_subpage')

@include('includes.error')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default rtl text-right">

            <div class="panel-heading">  
                <span>لیست محموله ها</span>
<a href="{{route('cargo.create')}}" class="btn btn-primary" >افزودن محموله جدید</a>
            </div>
            
            <div class="panel-body">
                <table class="table table-hover">

                    <thead >
                        <th>
                            شماره محموله
                        </th>
                        <th>
                            تامین کننده
                        </th>
                        <th>
                            وضعیت
                        </th>
                        <th>
                            تاریخ ارسال
                        </th>
                        
                    </thead>
                    <tbody>
                 
                    @foreach($cargoes as $cargo)
                        <tr>
                            <td>
                              <a href="{{route('cargo.edit' , ['id'=>$cargo->id])}}">{{$cargo->id}}</a>  
                            </td>
                            <td>
                                {{$cargo->user->vendor->name}}
                            </td>
                            <td>
                               {{$cargo->status}}
                            </td>
                            <td>
                            {{$cargo->delivery_date}}
                            </td>
                            
                        </tr>
                    @endforeach
                    
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@Section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>


@stop

@Section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop

