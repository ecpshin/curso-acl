@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $pageTitle }}</h3>
        </div>
        <div class="card-body">
            <div class="card-content">
                <form action="{{ route('posts.update', $post) }}" method="post">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label for="titulo">Título da postagem</label>
                        <input type="text" name="titulo" id="titulo" value="{{ $post->titulo }}"
                               class="form-control @error('titulo') is-invalid @enderror" placeholder="Título da postagem">
                        @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="postagem">Texto da postagem</label>
                        <textarea name="postagem" id="postagem" cols="30" rows="10"
                                  class="form-control">{{ $post->postagem }}</textarea>
                        @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-dark">Atualizar Postagem</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
