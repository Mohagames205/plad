<x-modal name="status-change" focusable>
    <form method="post" class="p-6">
        @csrf
        @method('PATCH')

        <h2 class="text-lg font-medium text-gray-900">
            Status aanpassen
        </h2>


        <div class="mt-6">
            <x-input-label for="status" value="{{ __('Status') }}" class="sr-only" />

            <div class="mt-4">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                <select id="status" name="status" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5">
                    <option selected>Selecteer een status</option>
                    <option value="0">Concept</option>
                    <option value="1">Actief</option>
                    <option value="2">Afgesloten</option>
                </select>

            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                Annuleren
            </x-secondary-button>

            <x-danger-button class="ms-3">
                Aanpassen
            </x-danger-button>
        </div>
    </form>
</x-modal>
