<?php

namespace Tests\Feature;

use App\Models\Expense;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

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
   public function user_can_create_expenses(): void
   {
    $this->withoutExceptionHandling();

    $attributes = Expense::factory()->raw();

    $this->post('/expenses', $attributes)
        ->assertRedirect('/expenses');

    $this->assertDatabaseHas('expenses', $attributes);
    } 
}
