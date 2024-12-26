<?php

namespace Tests\Feature;

use App\Models\Asset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssetTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function can_view_assets(): void
    {
        $this->withoutExceptionHandling();

        $asset = Asset::factory()->create();

        $this->get('/assets')->assertSee($asset->id);
    }

    /** @test */
    public function can_create_asset(): void
    {
        $this->withoutExceptionHandling();

        $attributes = Asset::factory()->raw();
        $this->post('/assets', $attributes)->assertRedirect('/assets');

        $this->assertDatabaseHas('assets', $attributes);
    }

    /** @test */
    public function can_view_an_asset(): void
    {
        $this->withoutExceptionHandling();

        $asset = Asset::factory()->create();

        $this->get('/assets/' . (string) $asset->id)->assertSee($asset->name);
    }

    /** @test */
    public function can_update_asset(): void
    {
        $this->withoutExceptionHandling();
        $asset = Asset::factory()->create();

        $changes = [
            'name' => $this->faker->word,
        ];

        $this->put('/assets/'. (string) $asset->id, $changes)->assertStatus(204);

        $this->assertDatabaseHas('assets', [
            'id' => $asset->id,
            'name' => $changes['name']
        ]);
    }
    
    /** @test */
    public function can_delete_asset(): void
    {
        $this->withoutExceptionHandling();

        $asset = Asset::factory()->create();
        $this->delete('/assets/'. (string) $asset->id)->assertStatus(204);

        $this->assertDatabaseMissing('assets', $asset->toArray());
    }
}
