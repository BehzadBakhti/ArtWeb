


@extends('layouts.dashboard')
@section('dashboadr_subpage')
<div class="container ">
    <div class="row my-4">
        <div class="col-md-10 col-md-offset-1 text-center rtl">
            <div class="panel-body">
                <table  class="table ">
                    <thead>
                        
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>نوع کاربری</th>
                            <th>وضعیت</th>
                    
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->user_role}}
                                </td>
                                <td>
                                    فعال
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
@endsection