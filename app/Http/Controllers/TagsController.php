<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

use Illuminate\Http\Request;

class TagsController extends Controller {

	public function index() {
		$tags = Tag::all();
	
		return view('tags.index', compact('tags'));
	}

	public function show(Tag $tag) {
		$articles = $tag->articles()->published()->get();
	
		return view('articles.index', compact('articles'));
	}

	public function update(Tag $tag) {
		dd($tag);
	}

}
