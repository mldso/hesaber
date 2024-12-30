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

        $this->get('/expenses/create')->assertStatus(200);

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

    /** @test */
    public function create_without_required_parameters_has_errors(): void
    {
        foreach(['asset_id', 'type_id', 'amount'] as $parameter) {
            $attributes = Expense::factory()->raw([$parameter => null]);

            $this->post('expenses', $attributes)
            ->assertStatus(302)
            ->assertSessionHasErrors($parameter);

            $this->assertDatabaseMissing('expenses', $attributes);
        }
    }

        /** @test */
        public function create_without_optional_parameters_has_no_errors(): void
        {
            foreach(['start_at', 'end_at', 'comment'] as $parameter) {
                $attributes = Expense::factory()->raw([$parameter => null]);
    
                $this->post('expenses', $attributes)
                ->assertSessionHasNoErrors()
                ->assertRedirect('/expenses');

                $this->assertDatabaseHas('expenses', $attributes);
            }
        }

    /** @test */
   public function user_can_edit_an_expense(): void
   {
        $this->withoutExceptionHandling();

        $expense = Expense::factory()->create();

        $this->get('/expenses/' . (string) $expense->id . '/edit')
            ->assertStatus(200);

        $expense_changes = Expense::factory()->raw(['id' => null]);

        $this->put('/expenses/' . (string) $expense->id, $expense_changes);

        $this->assertDatabaseHas('expenses', [
            'id'=> $expense->id,
            'amount' => $expense_changes['amount'],
            'start_at' => $expense_changes['start_at'],
            'end_at' => $expense_changes['end_at'],
            'comment' => $expense_changes['comment'],
            'asset_id' => $expense_changes['asset_id'],
            'type_id' => $expense_changes['type_id']
        ]);
    }
}
