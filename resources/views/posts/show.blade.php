@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $pageTitle }}</h3>
        </div>
        <div class="card-body">
            <div class="card-content">
                <fieldset disabled>
                    <div class="form-group">
                        <label for="titulo">Título da postagem</label>
                        <input type="text" name="titulo" id="titulo" value="{{ $post->titulo }}" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="postagem">Texto da postagem</label>
                        <textarea name="postagem" id="postagem" cols="30" rows="10" class="form-control">{{ $post->postagem }}</textarea>
                    </div>
                </fieldset>
                <a href="{{ route('posts.index') }}" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>
@endsection
