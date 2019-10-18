<!-- dashboard.blade.php -->
@extends('painel.templates.dashboard')

@section('content')	

<div class="title-pg">
    <h1 class="title-pg">Listagem dos Posts</h1>
</div>

<div class="content-din bg-white">

    <div class="form-search">
        <form class="form form-inline"  method="get" action="{{route('usuarios.search')}}" enctype="multipart/form-data">

            <input type="text" name="pesquisa"  class="form-control">

            <button type="submit" class="btn btn-default">Pesquisar</button>
        </form>
    </div>

    <div class="class-btn-insert">
        <a href="{{route('posts.create')}}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    @if( Session::has('success'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible hide-msg">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> {{Session::get('success')}}</h4>

        </div>
    </div>
@endif

    <table class="table table-striped">
        <tr>
            <th>Título</th>
            <th>Categoria</th>
            <th>Autor</th>
            <th>Situação</th>
            <th>Em destaque</th>
            <th>Data</th>
            <th>Hora</th>
            <th width="150">Ações</th>
        </tr>

        @forelse ($datas as $data)
            <tr>
            <td>{{ $data->title }}</td>
            <td>{{ $data->category->name }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->status === 'R' ? 'Rascunho' : 'Ativo' }}</td>
            <td>{{ $data->featured ? 'Sim' : 'Não' }}</td>
            <td>{{ date( 'd/m/Y' , strtotime($data->date)) }}</td>
            <td>{{ $data->hour }}</td>
            <td>
                <a href="{{route('posts.show', $data->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                <a href="{{route('posts.edit', $data->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
            </td>
            </tr>
        @empty
            <tr>
                <td>Nenhum registro encontrado!!</td>
            </tr>
        @endforelse

    </table>

    {{-- {{$users->links()}} --}}

    @if(isset($dataForm))
        {{$datas->appends(Request::only('pesquisa'))->links()}}
    @else
        {{$datas->links()}}
    @endif  

</div><!--Content Dinâmico-->
@endsection

@push('js')
    <script>
    $(function () {
        setTimeout("$('.hide-msg').fadeOut();", 3000)
    })
    </script>
@endpush

