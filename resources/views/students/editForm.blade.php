@extends('layouts.app')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{asset('img/'.$student->picture)}}" class="mx-auto d-block"  style="width:30%"/>
                        </div>
                        <div class="card-body">
                                <form action="{{route('students.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col">
                                        <input type="text" class="form-control" name="fname" value="{{$student->firstName}}" required>
                                        </div>
                                        <div class="col">
                                          <input type="text" class="form-control" name="lname" value="{{$student->lastName}}" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                      <div class="col">
                                        <select class="form-control" name="class">
                                            
                                            <option <?php if($student->class=="WEB-2020A"){?>selected="selected"<?php } ?> value="WEB-2020A">WEB-2020A</option>
                                            <option <?php if($student->class=="WEB-2020B"){?>selected="selected"<?php } ?> value="WEB-2020B">WEB-2020B</option>
                                            <option <?php if($student->class=="SNA-2020"){?>selected="selected"<?php } ?> value="SNA-2020">SNA-2020</option>
                                            
                                        </select>
                                      </div>
                                      <div class="col">
                                      <input type="file" class="form-control" name="picture" required>
                                      </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <input type="number" name="tutor" class="form-control" value="{{$student->user_id}}" >
                                        </div>
                                    </div>
                                    <div class="row mt-3 ml-1">
                                        <textarea name="description" id="description"  cols="67" rows="5" value="{{$student->description}}" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-danger mt-3 ">Update</button>
                                    <a type="button" class="btn btn-secondary mt-3 float-right" href="/home">Cancel</a>
                                </form>
                        </div>
                    </div>
            </div>
            <div class="col-3"></div>
        </div>
</div>
@endsection