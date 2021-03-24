@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>

        <div class="card-body">
            @if ($posts->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{ asset('storage/' . $post->image) }}" width="120px" height="70px" alt="">
                                </td>

                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $post->category->id) }}">
                                        {{ $post->category->name }}
                                    </a>
                                </td>
                                @if ($post->trashed())
                                    <td>
                                        <form action="{{ route('restore-post', $post->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-info btn-sm text-white">Restore</button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-info btn-sm text-white">Edit</a>
                                    </td>
                                @endif
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Posts Yet</h3>
            @endif
        </div>
    </div>


@endsection
