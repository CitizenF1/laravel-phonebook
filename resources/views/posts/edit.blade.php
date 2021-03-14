@extends('layouts.app')

@section('title', 'Редактировать')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">

            <form method="POST" action="{{ route('posts.update', $post) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="post-name">Имя</label>
                    <input type="text" name="name"
                           value="{{ $post->name }}" class="form-control" id="post-name">
                </div>
                <div class="form-group">
                    <label for="post-phone">Телефон</label>
                    <input type="text" name="phone"
                           value="{{ $post->phone }}" class="form-control" id="post-phone">
                </div>
                <div class="form-group">
                    <label for="post-email">email</label>
                    <input type="text" name="email"
                           value="{{ $post->email }}" class="form-control" id="post-email">
                </div>
                <button type="submit" class="btn btn-success">Отредактировать</button>
            </form>
        </div>
    </div>
@endsection


