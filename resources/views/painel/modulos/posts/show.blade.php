@extends('painel.templates.dashboard')
@section('content')
<div class="title-pg">
<h1 class="title-pg">Visualizar post: {{$data->name}}</h1>
</div>

<div class="content-din">
 <!-- Alert Errors start -->
 @if( isset($errors) && count($errors) > 0 )
 <div class="col-md-12">
     <div class="alert alert-warning alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
         @foreach( $errors->all() as $error)
             <p>{{$error}}</p>
         @endforeach
     </div>
 </div>

@endif
<!-- /.Alert Errors start -->
 <div class="box-body">
        <div class="row">
            <div class="col-md-8">
                <h4><strong>Título:</strong> {{ $data->title }}</h4>
                <h4><strong>Categoria:</strong> {{ $data->category->name }}</h4>
                <h4><strong>Usuário:</strong> {{ $data->user->name }}</h4>
                <h4><strong>Situação:</strong> {{ $data->status === 'R' ? 'Rascunho' : 'Ativo' }}</h4>
                <h4><strong>Eem destaque:</strong> {{ $data->featured ? 'Sim' : 'Não' }}</h4>
                <h4><strong>Data:</strong> {{ date( 'd/m/Y' , strtotime($data->date))}}</h4>
                <h4><strong>Hora:</strong> {{ $data->hour }}</h4>
            </div>
            <div class="col-md-4">
                @if(isset($data->image))
                <img src="{{URL::asset('/assets/uploads/post/'.$data->image)}}" alt="$user->image" class="img-responsive img-rounded img-bordered">
                @endif
            </div>
        </div>
    </div>

    <!-- form start -->
    <form role="form" method="post" action="{{route('posts.destroy', $data->id)}}" >
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="box-footer">
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Deletar</button>
                <a href="{{route('posts.index')}}" class="btn btn-info"><i class="fa fa-undo"></i>  Voltar</a>
            </div>
        </div>
    </form>
    

</div><!--Content Dinâmico-->
@endsection
