@extends('layout')
@section('content')
<form class="container mt-5" method="post" action="{{route('notes.update',$note->id)}}">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Edit Note</label>
      <input type="text" class="form-control" value="{{$note->Note}}" name="note">
    </div>

   <button type="submit" class="btn btn-primary">Update</button>
  </form>

  @endsection

