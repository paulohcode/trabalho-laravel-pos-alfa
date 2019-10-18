<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Painel\StandardController;
use App\Models\Post;

class PostController extends StandardController
{
    protected $model;
    protected $view = 'painel.modulos.posts';
    protected $upload = ['image'=> 'image', 'path' => 'post'];
    protected $route = 'posts';

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function search(Request $request)
    {
    //Recupera os dados do formulário
    $dataForm = $request->get('pesquisa');
    $users = $this->model
        ->where('name', 'LIKE', "%{$dataForm}%")
        ->orWhere('description', 'LIKE', "%{$dataForm}%")
        ->paginate($this->totalpages);
    return view("painel.modulos.usuarios.index", compact('users', 'dataForm'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::pluck('name', 'id');

        return view ("{$this->view}.create-edit", compact('categories'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recuperar usuário
        $data = $this->model->find($id);
        $categories = \App\Models\Category::pluck('name', 'id');
 
        return view("{$this->view}.create-edit", compact('data', 'categories'));
    }
}
