<?php

namespace Tests\Feature;

use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TypeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_view_types(): void
    {
        $this->withoutExceptionHandling();

        $type = Type::factory()->create();

        $this->get('/types')->assertSee($type->id);
    }

    /** @test */
    public function can_create_type(): void
    {
        $this->withoutExceptionHandling();

        $attributes = Type::factory()->raw();
        $this->post('/types', $attributes)->assertRedirect('/types');

        $this->assertDatabaseHas('types', $attributes);
    }

    /** @test */
    public function can_view_an_type(): void
    {
        $this->withoutExceptionHandling();

        $type = Type::factory()->create();

        $this->get('/types/' . (string) $type->id)->assertSee($type->name);
    }

    /** @test */
    public function can_update_type(): void
    {
        $this->withoutExceptionHandling();
        $type = Type::factory()->create();

        $changes = [
            'name' => $this->faker->word,
        ];

        $this->put('/types/'. (string) $type->id, $changes)->assertStatus(204);

        $this->assertDatabaseHas('types', [
            'id' => $type->id,
            'name' => $changes['name']
        ]);
    }
    
    /** @test */
    public function can_delete_type(): void
    {
        $this->withoutExceptionHandling();

        $type = Type::factory()->create();
        $this->delete('/types/'. (string) $type->id)->assertStatus(204);

        $this->assertDatabaseMissing('types', $type->toArray());
    }
}
