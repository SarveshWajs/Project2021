@extends('layouts.admin_app')

@section('content')
<div class="page-header">
    <h1>
        Customers' Feedback
      
    </h1>
</div>

<div class="row" style="overflow: auto;">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Message
                    </th>
                </tr>
            </thead>
            <tbody>
                
               @foreach($student as $row => $user) 
                <tr>
                    <td>
                       {{ $row+1 }}
                        <input type="hidden" class="row_id" value="{{ $user->id }}">
                    </td>
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->user_mail}}</td>
                    <td>{{$user->user_feedback}}</td>
                </tr>
               
               
              @endforeach
            </tbody>
        </table>
       
    </div>
</div>

@endsection

@section('js')

@endsection