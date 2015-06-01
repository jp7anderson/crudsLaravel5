<?php 
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class PagesTest extends TestCase {

	use DatabaseTransactions;
	
	function test_it_visit_home() {
		$this->visit('/')
			->andSee('Bem Vindo')
			->andSeeStatusCodeIs(200);
			//seeJsonContains(['name' => 'john'])
	}

	function test_it_visit_tags() {
		\Auth::loginUsingId(1);
		$tag = TestDummy::create('App\Tag');

		$this->visit('tags')
			->andSee('Tags')
			->andSee($tag['name'])
			->andSeeStatusCodeIs(200);
	}

}	