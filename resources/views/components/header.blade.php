 <header class="border-b border-gray-200 bg-gray-50">
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
      <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Hesaber</h1>
  
          <p class="mt-1.5 text-sm text-gray-500">
            Monthly Expenses
          </p>
        </div>
  
        <div class="flex items-center gap-4">
          <a
            href="{{ URL::route('expenses.create') }}"
            class="inline-block rounded bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
            type="button"
          >
            Add Expense
          </a>
        </div>
      </div>
    </div>
  </header>