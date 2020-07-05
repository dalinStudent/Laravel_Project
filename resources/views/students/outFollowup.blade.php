@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <div class="col-3"></div>
        <div class="col-6">
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Classs</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($students as $student)
                    @if ($student->activefollowup==0)
                        <tbody>
                            <tr>
                                <td><img class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}" class="img-fluid rounded-circle"></td>
                                <td>{{$student->firstName}}</td>
                                <td>{{$student->lastName}}</td>
                                <td>{{$student->class}}</td>
                                <td class=" text-center">
                                    <a href="{{route('backFollowup',$student->id)}}"><i class="material-icons">swap_horiz</i></a>
                                </td>
                        </tbody>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="col-3"></div>
    </div>
@endsection