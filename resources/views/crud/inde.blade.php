@extends('layout.default')
@section('content')
    <div class="container">
        <div class="float-right">
            <a href="{{url('laravel-easy-crud/create')}}" class="btn btn-primary">New</a>
        </div>
        <h1 style="font-size: 2.2rem">Customers List (Laravel 5.5 CRUD Example)</h1>
        <hr/>
        <table class="table table-bordered bg-light">
            <thead class="bg-dark" style="color: white">
            <tr>
                <th width="60px" style="text-align: center">No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th width="150px">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i=1;
            @endphp
            @foreach($customers as $customer)
                <tr>
                    <th style="text-align: center">{{$i++}}</th>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->gender}}</td>
                    <td>{{$customer->email}}</td>
                    <td align="center">
                        <form id="frm_{{$customer->id}}"
                              action="{{url('laravel-easy-crud/delete/'.$customer->id)}}"
                              method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                            <a class="btn btn-primary btn-sm" title="Edit"
                               href="{{url('laravel-easy-crud/update/'.$customer->id)}}">
                                Edit</a>
                            <input type="hidden" name="_method" value="delete"/>
                            {{csrf_field()}}
                            <a class="btn btn-danger btn-sm" title="Delete"
                               href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$customer->id}}').submit()">
                                Delete
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-end">
                {{$customers->links('vendor.pagination.bootstrap-4')}}
            </ul>
        </nav>
    </div>
@endsection