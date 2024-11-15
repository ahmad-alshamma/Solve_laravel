    @extends('layout')
    @section('content')
    <form class="container mt-5" method="POST" action="{{route('notes.store')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Note</label>
          <input type="text" class="form-control"  name="note">
        </div>

       <button type="submit" class="btn btn-primary">Add</button>
      </form>

      @endsection

