<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller {

	public function __construct() {
		//App\Http\Controllers\Controller -- está setado no App\Http\Kernel.php
		$this->middleware('auth', ['only' => 'create']);
	}

	public function index() {
		$articles = Article::latest()->published()->get(); //Latest pega os registro em ASC
		
		return view('articles.index', compact('articles'));
	}

	public function show(Article $article) {
		//a pesquisa pelo id é feita no App\Providers\RouteServiceProvider
		return view('articles.show', compact('article'));
	}

	public function create() {
		return view('articles.create');
	}

	public function store(ArticleRequest $request) {
		$article = new Article($request->all());
		\Auth::user()->articles()->save($article);

		return redirect('articles');
	}

	public function edit(Article $article) {
		//a pesquisa pelo id é feita no App\Providers\RouteServiceProvider
		return view('articles.edit', compact('article'));
	}

	public function update(Article $article, ArticleRequest $request) {
		//a pesquisa pelo id é feita no App\Providers\RouteServiceProvider
		$article->update($request->all());

		return redirect('articles');
	}

}
