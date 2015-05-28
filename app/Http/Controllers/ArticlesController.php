<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller {

	public function __construct() {
		//App\Http\Controllers\Controller -- está setado no App\Http\Kernel.php
		$this->middleware('auth', ['except' => ['index', 'show']]);
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
		$tags = \App\Tag::lists('name', 'id');

		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request) {
		/*
		 * $article = new Article($request->all()); dando um create com os dados do input
		 * \Auth::user()->articles()->save($article); e salvando
		 */

		$this->createArticle($request);

		flash()->success('Your article has been created!');

		return redirect('articles');
	}

	public function edit(Article $article) {
		//a pesquisa pelo id é feita no App\Providers\RouteServiceProvider
		$tags = \App\Tag::lists('name', 'id');

		return view('articles.edit', compact('article', 'tags'));
	}

	public function update(Article $article, ArticleRequest $request) {
		//a pesquisa pelo id é feita no App\Providers\RouteServiceProvider
		$article->update($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return redirect('articles');
	}

	private function syncTags(Article $article, array $tags) {
		$article->tags()->sync($tags);
	}

	private function createArticle(ArticleRequest $request) {
		$article = \Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return $article;
	}

}
