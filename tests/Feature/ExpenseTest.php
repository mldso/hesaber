<?php

namespace Tests\Feature;

use App\Models\Asset;
use App\Models\Expense;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase, WithFaker;

   /** @test */
   public function user_can_view_expenses(): void
   {
    $this->withoutExceptionHandling();

    $expense = Expense::factory()->create();

    $this->get('/expenses')
        ->assertSee($expense->asset->name)
        ->assertSee($expense->type->name)
        ->assertSee($expense->amount);
   } 

   /** @test */
   public function user_can_view_an_expense(): void
   {
    $this->withoutExceptionHandling();

    $expense = Expense::factory()->create();

    $this->get('/expenses/' . (string) $expense->id)
        ->assertSee($expense->asset->name)
        ->assertSee($expense->type->name)
        ->assertSee($expense->amount);
   }

   /** @test */
   public function user_can_create_expenses(): void
   {
        $this->withoutExceptionHandling();

        $attributes = Expense::factory()->raw();

        $this->post('/expenses', $attributes)
            ->assertRedirect('/expenses');

        $this->assertDatabaseHas('expenses', $attributes);
    }

   /** @test */
    public function user_can_update_expense(): void
    {                                                           
        $this->withoutExceptionHandling();

        $expense = Expense::factory()->create();

        $asset = Asset::factory()->create();
        $type = Type::factory()->create();

        $new_start = $this->faker->date();
        $new_end = $this->faker->date();


        $this->put('/expenses/' . $expense->id, [
            'asset_id' => $asset->id,
            'type_id' => $type->id,
            'amount' => 30.21,
            'comment' => 'changed',
            'start_at' => $new_start,
            'end_at' => $new_end
        ]);

        $this->assertDatabaseHas('expenses', [
            'id' => $expense->id,
            'asset_id' => $asset->id,
            'type_id' => $type->id,
            'amount' => 30.21,
            'comment' => 'changed',
            'start_at' => $new_start,
            'end_at' => $new_end
        ]);

        $this->assertDatabaseMissing('expenses', [
            'type_id' => $expense->type_id,
            'asset_id' => $expense->asset_id,
            'amount' => $expense->amount,
            'comment' => $asset->comment,
            'start_at' => $expense->start_at,
            'end_at' => $expense->end_at
        ]);
    }

    /** @test */
    public function expense_can_be_deleted(): void
    {
        $this->withoutExceptionHandling();

        $expense = Expense::factory()->create();

        $this->delete('/expenses/' . (string) $expense->id)
            ->assertRedirect('/expenses');

        $this->assertDatabaseMissing('expenses', $expense->toArray());
    }


    /** @test */
    public function expense_has_relationships(): void
    {
        $expense = Expense::factory()->create();

        $this->assertInstanceOf(Asset::class, $expense->asset);
        $this->assertInstanceOf(Type::class, $expense->type);
    }
}
