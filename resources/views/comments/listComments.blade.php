@extends('layouts.app')
@section('content')
<div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addStudent">
                    Add Student
                </button>
                <a href="/home" class="btn btn-danger float-right">Back</a>
                
                  <!-- The Modal -->
                  <div class="modal" id="addStudent">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Comment</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body --> 
                        <div class="modal-body">
                        <form action="{{route('addComment',$student->id)}}" method="POST">
                              @csrf
                              <div class="form-group">
                                    <textarea name="comment" id="comment"  cols="63" rows="5" placeholder="comment" required></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary mt-3 ">Add</button>
                              <button type="button" class="btn btn-secondary mt-3 float-right" data-dismiss="modal">Cancel</button>
                          </form>
                        </div>                        
                      </div>
                    </div> 
                  </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($comments as $comment)
                        
                    <tbody>
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->comment}}</td>
                            <td>
                                <a href="{{route('comments.edit',$comment->id)}}"><i class="material-icons">edit</i></a>
                    
                                  <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       
                                        <button type="submit" onclick="return confirm('Are you sure to delete?')"><i class="material-icons text-danger">delete</i></button>
                                   </form>
                             
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection