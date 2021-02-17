<?php

namespace Tests\Feature\Livewire\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_have_livewire_component_in_registration_page()
    {
        $this->get('/register')
            ->assertSeeLivewire('auth.register');
    }


    /** @test*/
    public function it_should_register()
    {
        Livewire::test('auth.register')
            ->set('email','test@email.com')
            ->set('password','password')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::whereEmail('test@email.com')->exists());
        $this->assertEquals('test@email.com',auth()->user()->email);
    }

    /** @test*/
    public function it_should_require_email()
    {
        Livewire::test('auth.register')
            ->set('email','')
            ->set('password','password')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test*/
    public function it_should_only_accept_valid_email()
    {
        Livewire::test('auth.register')
            ->set('email','asdfasdf')
            ->set('password','password')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test*/
    public function it_should_check_unique_email()
    {
        User::factory()->create(['email'=>'exist@email.com']);

        Livewire::test('auth.register')
            ->set('email','exist@email.com')
            ->set('password','password')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test*/
    public function it_should_see_email_hasnt_already_been_taken_validation_message_as_user_types()
    {
        User::factory()->create(['email'=>'exist@email.com']);

        Livewire::test('auth.register')
            ->set('email','not-exist@email.com')
            ->assertHasNoErrors()
            ->set('email','exist@email.com')
            ->assertHasErrors(['email'=>'unique']);
    }

    /** @test*/
    public function it_should_require_password()
    {
        Livewire::test('auth.register')
            ->set('email','exist@email.com')
            ->set('password','')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test*/
    public function it_should_check_password_with_min_6_char()
    {
        Livewire::test('auth.register')
            ->set('email','exist@email.com')
            ->set('password','asdf')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertHasErrors(['password' => 'min']);
    }

    /** @test*/
    public function it_should_check_password_with_passwordConfirmation()
    {
        Livewire::test('auth.register')
            ->set('email','exist@email.com')
            ->set('password','notSamePassword')
            ->set('passwordConfirmation','password')
            ->call('register')
            ->assertHasErrors(['password' => 'same']);
    }

}
