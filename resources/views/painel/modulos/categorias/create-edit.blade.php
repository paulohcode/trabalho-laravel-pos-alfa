<!-- dashboard.blade.php -->
@extends('painel.templates.dashboard')

@section('content')	

<div class="title-pg">
        <h1 class="title-pg">Cadasro de Categorias</h1>
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



@if(isset($data))
    <form 
    class="form form-search form-ds"  
    method="post" action="{{route('categorias.update', $data->id)}}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
@else
    <form 
    class="form form-search form-ds"  
    method="post" action="{{route('categorias.store')}}" enctype="multipart/form-data">
@endif
        {{ csrf_field() }} 
        
        <div class="form-group col-md-6">
                <label for="InputName">Nome</label>
                <input type="text" class="form-control" id="InputName" name="name" placeholder="Nome" value="{{$data->name ?? old('name')}}">
            </div>
            <div class="form-group col-md-6">
                    <label for="InputUrl">Email</label>
                    <input type="text" class="form-control" id="InputUrl" name="url" placeholder="Url" value="{{$data->url ?? old('url')}}">
                </div>
            
                <!-- textarea -->
                <div class="form-group col-md-6">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="Digite aqui ...">{{$data->description ?? old('description')}}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="InputFile">Imagem da Categoria</label>
                    <input type="file" id="InputFile" name="image">
                </div>

                <div class="form-group col-md-6">
                        <button class="btn btn-info">Enviar</button>
                </div>
    </form>

</div><!--Content Dinâmico-->
@endsection


