@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Comment</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('comments.update',$comment->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="comment" value="{{$comment->comment}}" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 ">Update</button>
                            <button type="button" class="btn btn-secondary mt-3 float-right">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection