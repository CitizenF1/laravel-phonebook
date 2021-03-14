@extends('layouts.app')

@section('title', 'Добавить')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="post-title">Имя</label>
                    <input type="text" name="name"
                           value="" class="form-control" id="post-name">
                </div>
                <div class="form-group">
                    <label for="post-description">Телефон</label>
                    <input type="text" name="phone"
                           value="" class="form-control" id="post-phone">
                </div>
                <div class="form-group">
                    <label for="post-price">email</label>
                    <input type="text" name="email"
                           value="" class="form-control" id="post-email">
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>
@endsection
