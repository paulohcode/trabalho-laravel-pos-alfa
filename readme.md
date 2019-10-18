<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><img src="http://www.alfaumuarama.com.br/estrutura/img/Logo_FAU_SM.png"></p>


## Projeto Final Disciplina Programação PHP com Framework Laravel

Com base neste projeto e utilizando os conhecimento apresentados nas aula, façam:

- Controller dos Posts Otimizado [StandardController];
- O Crud dos Posts, usem como modelo o crud de categorias;
- Personalizem as telas de login e register, podem usar o modelo sugerido em aula, mas fiquem livre caso queiram desenvolver outro layout;
- Façam a integração do site com dashboard, ou seja, os posts cadastrados no dashboard sejam visualizados na home, seguinte a estrutura já apresentada.

## Data de Entrega

[01/10/2019], você deve criar um repositório no github com o projeto e enviar o link para o email jaime.vendrame@gmail.com

## Atenção

Verifiquem os arquivos que foram atualizados:
 - routes\web.php foi criado uma rota raiz para a página inicial do dashboard.
 - App\Models\Post.php ele já está pronto para uso, observem os metódos novos que foram criados, referente a relationships [Relacionamentos de tabelas], também fiz alterações nas models de User.php e Category.php.
 
 [Exemplo: App\Models\Post.php]
 <p>
    <pre><code>
   /**
     * Retornar o usuário do post./
   */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  </code></pre></p>
    
Neste Metodo através da class da Model Post é possivel ter retorno do usuário que fez o post.

Como chamar essa metodo:
Na [view] usando um forelse para listar os post e o respectivo nome do usuário autor do post:

<p><pre><code>
    @forelse ($posts as $post)
        .
        .
        {{$post->user->name}}
    @empty
     //
    @endforelse
</code></pre></p>

Acessem a Documentação para mais detalhes sobre. [Laravel documentation](https://laravel.com/docs/5.8/eloquent-relationships).

E isso é o fim, fico a disposição para dúvida. E bom trabalho.


