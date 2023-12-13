@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-lg-8">
            @can('post_create')
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Nova Postagem</a>
            @endcan
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->titulo}}</td>
                        <td>
                            <div class="btn-group-sm">
                                <a href="{{ route('posts.show', ['post' => $item]) }}" class="btn btn-outline-dark">exibir</a>
                                @can(['post_update', 'post_delete'])
                                    <a href="{{ route('posts.edit', ['post' => $item]) }}" class="btn btn-outline-info">editar</a>
                                    <a href="#" class="btn btn-outline-danger" onclick="document.getElementById('form_{{ $item->id }}').submit();">delete</a>
                                    <form action="{{ route('posts.delete', ['post' => $item]) }}" id="form_{{ $item->id }}" class="d-none">
                                        @csrf @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Não há registros</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
