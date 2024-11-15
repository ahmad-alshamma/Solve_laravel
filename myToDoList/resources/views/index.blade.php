@extends('layout')
@section('content')
<div class="container text-start mt-5 mb-5">
    <a href="{{ route('notes.create') }}"><button type="button" class="btn btn-primary">Add Note</button></a>
</div>

<table class="table container">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">to do</th>
            <th scope="col">create_time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notes as $note)
        <tr>
            <th scope="row">{{ $note->id }}</th>
            <td>{{ $note->Note }}</td>
            <td>{{ $note->created_at }}</td>
            <td>
                <a href="{{ route('notes.edit', $note->id) }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                    data-id="{{ $note->id }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this note?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="post">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script to handle delete confirmation
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const noteId = button.getAttribute('data-id');
        const action = `{{ route('notes.destroy', ':id') }}`.replace(':id', noteId);
        deleteForm.setAttribute('action', action);
    });
</script>
@endsection
