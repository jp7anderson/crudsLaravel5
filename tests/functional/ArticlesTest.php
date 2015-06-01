<?php 

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class ArticlesTest extends TestCase {

	use DatabaseTransactions;

	function test_it_register_a_article() {
		//$this->post('/articles', $article)->dump()->andSeePageIs('/articles');
		$this->registerArticle()
			->verifyInDatabase('articles', ['title' => 'titulo teste'])
			->andSeePageIs('/articles');
	}

	function test_it_visit_and_edit_articles() {
		\Auth::loginUsingId(1);
		$article = TestDummy::create('App\Article', ['user_id' => '1']);

		$this->visit('articles')
			->andSee($article['body']) //Visualizar o body da article
			->editArticle($article)
			->andSeePageIs('/articles')
			->andSeeStatusCodeIs(200);
	}

	protected function registerArticle() {
		\Auth::loginUsingId(1);
		$tags = ['tag_list' => '1'];
		$article = TestDummy::attributesFor('App\Article', $tags);

		return $this->visit('articles/create')
			//->type('Title', 'title')
			//->type('Body', 'body')
			//->select('animals', 'dog')
			//->check('opt-in')
			->see('Write a New Article')
			->andSubmitForm('Add Article', $article);
	}

	protected function editArticle($article) {
		$body = ['body' => 'Body editado'];

		return $this->andClick('Edit') // entrar na pagina de editar
				->andSee('Edit: '.$article['title']) // visualizar o titulo da article para editar
				->andSubmitForm('Update Article', $body);
	}

}	