<?php

namespace Tests\Feature;

use App\Models\Human;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HumanTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_view_renders_successfully_with_links(): void
    {
        $response = $this->get(route('humans.home'));

        $response->assertStatus(200);
        $response->assertSee(route('humans.create'));
        $response->assertSee(route('humans.index'));
        $response->assertSee(route('humans.battle'));
    }

    public function test_create_view_renders_successfully(): void
    {
        $response = $this->get(route('humans.create'));

        $response->assertStatus(200);
        $response->assertSee('Registrar Humano');
    }

    public function test_human_can_be_registered_successfully(): void
    {
        $humanData = [
            'name' => 'Goku',
            'aura' => 9000,
            'hierarchy' => 'legendario',
        ];

        $response = $this->post(route('humans.store'), $humanData);

        $response->assertRedirect(route('humans.create'));
        $response->assertSessionHas('success', 'Humano registrado exitosamente.');

        $this->assertDatabaseHas('humans', [
            'name' => 'Goku',
            'aura' => 9000,
            'hierarchy' => 'legendario',
        ]);
    }

    public function test_humans_are_listed_ordered_by_aura_desc(): void
    {
        $human1 = new Human;
        $human1->setName('Comun Human');
        $human1->setAura(100);
        $human1->setHierarchy('común');
        $human1->save();

        $human2 = new Human;
        $human2->setName('Legendario Human');
        $human2->setAura(500);
        $human2->setHierarchy('legendario');
        $human2->save();

        $response = $this->get(route('humans.index'));

        $response->assertStatus(200);
        $response->assertSee('Boff');
        $response->assertSee('style="color: blue; font-weight: bold;"', false);
        $response->assertSeeInOrder(['Legendario Human', 'Comun Human']);
    }

    public function test_battle_determines_winner_correctly(): void
    {
        $human1 = new Human;
        $human1->setName('Fighter One');
        $human1->setAura(300);
        $human1->setHierarchy('moderado');
        $human1->save();

        $human2 = new Human;
        $human2->setName('Fighter Two');
        $human2->setAura(150);
        $human2->setHierarchy('común');
        $human2->save();

        $response = $this->get(route('humans.battle'));

        $response->assertStatus(200);
        $response->assertSee('¡Ganador: Fighter One!');
    }
}
