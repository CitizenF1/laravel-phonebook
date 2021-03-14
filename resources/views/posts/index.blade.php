@extends('layouts.app')

@section('title', 'Все посты')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-success">Добавить</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->name }}</td>
                <td>{{ $post->phone }}</td>
                <td>{{ $post->email }}</td>
                <td class="table-buttons">
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" ></i>
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
