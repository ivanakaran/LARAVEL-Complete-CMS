@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('tags.create') }}" class="btn btn-success mb-2">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if ($tags->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Categories count</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>

                                <td>{{ $tag->posts->count() }}</td>
                                <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="handleDelete({{ $tag->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



                <!-- Modal -->
                <form action="" method="post" id="deleteTagForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are you sure you want to delete this tag?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go
                                        back</button>
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            @else
                <h3 class="text-center">No Tags yet</h3>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            let form = document.getElementById('deleteTagForm')
            form.action = '/tags/' + id
            $('#deleteModal').modal('show');

        }

    </script>
@endsection
