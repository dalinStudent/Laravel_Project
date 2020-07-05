@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <img src="{{asset('img/'.$student->picture)}}" class="mx-auto d-block"  style="width:30%"/>
                    </div>
                    <div class="card-body">
                        <p><strong>FIRST NAME: </strong>{{$student->firstName}}</p>
                        <p><strong>LAST NAME: </strong>{{$student->lastName}}</p>
                        <p><strong>CLASS: </strong>{{$student->class}}</p>
                        <p><strong>DESCRIPTION: </strong>{{$student->description}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/home" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection