<x-layout>
<div class="rounded-lg border border-gray-200">
  <div class="overflow-x-auto rounded-t-lg">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
      <thead class="text-left">
        <tr>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Type</th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Asset</th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Amount</th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Start At</th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">End At</th>
          <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Comment</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-200">
        @foreach ($expenses as $expense)
        <tr>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $expense->type->name }}</td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">{{ $expense->asset->name }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $expense->amount }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $expense->start_at }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $expense->end_at }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $expense->comment }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
    <ol class="flex justify-end gap-1 text-xs font-medium">
      <li>
        <a
          href="#"
          class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
        >
          <span class="sr-only">Prev Page</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="size-3"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>

      <li>
        <a
          href="#"
          class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"
        >
          1
        </a>
      </li>

      <li class="block size-8 rounded border-blue-600 bg-blue-600 text-center leading-8 text-white">
        2
      </li>

      <li>
        <a
          href="#"
          class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"
        >
          3
        </a>
      </li>

      <li>
        <a
          href="#"
          class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"
        >
          4
        </a>
      </li>

      <li>
        <a
          href="#"
          class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
        >
          <span class="sr-only">Next Page</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="size-3"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </a>
      </li>
    </ol>
  </div>
</div>
</x-layout>

