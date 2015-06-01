<?php 

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class AuthTest extends TestCase {

	use DatabaseTransactions, RegistersUsers;

	function test_it_register_a_user() {
		$credentials = ['email' => 'foo@example.com.br'];

		$this->register($credentials)
			->verifyInDatabase('users', $credentials)
			->andSeePageIs('/articles');
	}

	function test_it_notifies_a_user_of_registration_errors() {
		$this->createUser($overrides = ['email' => 'foo@example.com']);

		$this->register($overrides)
			->andSee('The email has already been taken.')
			->onPage('auth/register');
	}

	protected function createUser(array $overrides = []) {
		return TestDummy::create('App\User', $overrides);
	}

}