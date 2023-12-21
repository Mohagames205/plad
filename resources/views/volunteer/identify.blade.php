<x-guest-layout>


    <div class="m-4">
        <p class='text-xl mb-4'>Unieke code</p>
        <p >Vul hier de unieke code in die je hebt ontvangen in je mailbox.</p>

        <form class="mt-4" action="/selling_event">
            <x-input-label for="code">Unieke code</x-input-label>
            <x-text-input type="text" name="code" id="code" class="block w-full"/>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Indienen') }}
                </x-primary-button>
            </div>

        </form>
    </div>
</x-guest-layout>
