<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_see_livewire_profile_component_on_profile_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

//        $this->withoutExceptionHandling();  // This can be handy

        $this->get(route('profile'))
            ->assertSuccessful()
            ->assertSeeLivewire('profile');
    }

    /** @test */
    public function it_should_update_profile()
    {
        $user = User::factory()->create();

//        $this->actingAs($user);  // Can be here or inside Livewire::

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', 'bar')
            ->call('save');

        $user->refresh();

        $this->assertEquals('foo', $user->username);

        $this->assertEquals('bar', $user->about);
    }

    /** @test */
    public function it_should_have_pre_populated()
    {
        $user = User::factory()->create([
            'username' => 'foo',
            'about' => 'bar',
        ]);

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foo')
            ->set('about', 'bar')
            ->call('save');
    }

    /** @test */
    public function it_should_have_username_with_less_than_24_characters()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', str_repeat('a', 25))
            ->call('save')
            ->assertHasErrors(['username' => 'max']);
    }

    /** @test */
    public function it_should_have_about_with_less_than_140_characters()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('about', str_repeat('a', 141))
            ->call('save')
            ->assertHasErrors(['about' => 'max']);
    }
}
