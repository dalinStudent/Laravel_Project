@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link">Follow Up</a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link active">Out Follow Up</a>
        </li>
    </ul>
</div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addStudent">
                    Add Student
                </button>
                
                  <!-- The Modal -->
                  <div class="modal" id="addStudent">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Student</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                  <div class="col">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                  </div>
                                  <div class="col">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name"required>
                                  </div>
                              </div>
                              <div class="row mt-3">
                                <div class="col">
                                    <select name="class" id="class" class="form-control">
                                        <option value="Class" disabled>Class</option>
                                        <option value="WEB-2020A">WEB-2020A</option>
                                        <option value="WEB-2020B">WEB-2020B</option>
                                        <option value="SNA2020">SNA2020</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="file" class="form-control" name="picture" required>
                                </div>
                              </div>
                              <div class="row mt-3">
                                  <div class="col">
                                      <input type="number" name="tutor" class="form-control" placeholder="Tutor">
                                  </div>
                              </div>
                              <div class="row mt-3 ml-1">
                                  <textarea name="description" id="description"  cols="63" rows="5" placeholder="Description" required></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary mt-3 ">Add</button>
                              <button type="button" class="btn btn-secondary mt-3 float-right" data-dismiss="modal">Cancel</button>
                          </form>
                        </div>                        
                      </div>
                    </div> 
                  </div>
                  <table id="tableData" class="table table-striped table-bordered table-sm text-center mt-3" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">#</th>
                      <th class="th-sm">First Name</th>
                      <th class="th-sm">Last Name</th>
                      <th class="th-sm">Class</th>
                      <th class="th-sm">Action</th>
                    </tr>
                  </thead>
                  @foreach ($students as $student)
                  @if ($student->activefollowup==1)
                  <tbody>
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                          {{-- @if (auth::user()->role_id==1) --}}
                          <a href="{{route('students.show',$student->id)}}"><i class='material-icons text-success'>visibility</i></a>
                            <a href="{{route('students.edit',$student->id)}}"><i class="material-icons">edit</i></a>
                            <a href="{{route('comments.show',$student->id)}}"><i class="material-icons text-secondary">comment</i></a>
                            <a href="{{route('outFollowup',$student->id)}}"><i class="material-icons text-danger">forward</i></a>
                          {{-- @endif --}}
                               
                        </td>
                    </tr>
                  </tbody>
                  @endif
                  
                  @endforeach
                </table>
            </div>
        </div>
    </div>
              
@endsection


