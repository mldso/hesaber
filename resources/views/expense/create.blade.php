<x-layout>
    <div class="container">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="mx-auto text-start">
                <h1 class="text-2xl font-bold sm:text-3xl">New Expense!</h1>
            </div>

            <form action="#" class="mx-auto mb-0 mt-8 space-y-4">

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                    <div>
                        <div class="mt-4">
                            <label>Asset: </label>

                            <select
                                class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm p-4">
                                <option value="">Please select</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label>Type: </label>

                            <select
                                class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm p-4">
                                <option value="">Please select</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label>Amount:</label>
                                <div class="relative">
                                    <input type="number"
                                        class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5 "
                                        step=0.01 />
                                </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4">
                            <label>Start At:</label>

                                <div class="relative">
                                    <input type="date"
                                        class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5" />
                                </div>
                        </div>

                        <div class="mt-4">
                            <label>End At:</label>

                                <div class="relative">
                                    <input type="date"
                                        class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5" />
                                </div>
                        </div>

                        <div class="mt-4">
                            <label>Comment:</label>

                                <div class="relative">
                                    <textarea rows="4" class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm mt-1.5"></textarea>
                                </div>
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
