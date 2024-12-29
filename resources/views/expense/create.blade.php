<x-layout>
  <div class="container">
    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
      <div class="mx-auto text-start">
        <h1 class="text-2xl font-bold sm:text-3xl">New Expense!</h1>
      </div>

      <form method="POST" action="/expenses" class="mx-auto mb-0 mt-8 space-y-4">
        @csrf
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
          <div>
            <div class="mt-4">
              <label>Asset: </label>

              <select name="asset_id" class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm p-4">
                <option value="">Please select</option>
                @foreach ($assets as $asset)
                  <option value="{{ $asset->id }}" {{ old('asset_id') == $asset->id ? 'selected' : '' }}>{{ $asset->name }}</option>
                @endforeach
              </select>

              @error('asset_id')
                <p class="text-red-200">{{ $message }}</p>
              @enderror
            </div>

            <div class="mt-4">
              <label>Type: </label>

              <select name="type_id" class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm p-4">
                <option value="">Please select</option>
                @foreach ($types as $type)
                  <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
              </select>

              @error('type_id')
                <p class="text-red-200">{{ $message }}</p>
              @enderror
            </div>

            <div class="mt-4">
              <label>Amount:</label>
              <div class="relative">
                <input name="amount" type="number" class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5" step=0.01 value="{{ old('amount') }}" />

                  @error('amount')
                <p class="text-red-200">{{ $message }}</p>
              @enderror
              </div>
            </div>
          </div>
          <div>
            <div class="mt-4">
              <label>Start At:</label>

              <div class="relative">
                <input name="start_at" type="date" class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5"  value="{{ old('start_at') }}" />
              </div>

              @error('start_at')
                <p class="text-red-200">{{ $message }}</p>
              @enderror
            </div>

            <div class="mt-4">
              <label>End At:</label>

              <div class="relative">
                <input name="end_at" type="date" class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5"  value="{{ old('end_at') }}" />
              </div>

              @error('end_at')
                <p class="text-red-200">{{ $message }}</p>
              @enderror
            </div>

            <div class="mt-4">
              <label>Comment:</label>

              <div class="relative">
                <textarea name="comment" rows="4" class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5"  value="{{ old('comment') }}"></textarea>
              </div>
              @error('comment')
                <p class="text-red-200">{{ $message }}</p>
              @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
              <button type="submit"
                class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                Submit
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</x-layout>
