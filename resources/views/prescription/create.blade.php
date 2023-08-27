<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prescriptions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-xl mb-10 font-bold">{{ __("PRESCRIPTION UPLOAD FORM") }}</h1>
                    <form class="w-full max-w-lg mx-auto" method="POST" action="{{route('prescription.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                              <x-input-label for="images" :value="__('Images')" />
                              <x-text-input id="images" class="block mt-1 w-full" type="file" name="images[]" multiple :value="old('images[]')" required autocomplete="images" />
                              <x-input-error :messages="$errors->get('images')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <x-input-label for="delivery_address" :value="__('Delivery Address')" />
                                <x-text-input id="delivery_address" class="block mt-1 w-full" type="text" name="delivery_address" :value="old('delivery_address')" required autocomplete="delivery_address" />
                                <x-input-error :messages="$errors->get('delivery_address')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <x-input-label for="delivery_time" :value="__('Delivery Time')" />
                                <select id="delivery_time" name="delivery_time" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></select>
                                    <script>
                                        const timeSlotSelect = document.getElementById('delivery_time');
                                        
                                        for (let hour = 8; hour <= 22; hour += 2) {
                                            const formattedHour = hour.toString().padStart(2, '0');
                                            const timeLabel = `${formattedHour}:00 ${hour < 12 ? 'AM' : 'PM'}`;
                                            
                                            const option = document.createElement('option');
                                            option.value = `${formattedHour}:00`;
                                            option.textContent = timeLabel;
                                            
                                            timeSlotSelect.appendChild(option);
                                        }
                                    </script>
                                <x-input-error :messages="$errors->get('delivery_time')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                          <div class="w-full px-3">
                            <x-input-label for="note" :value="__('Note')" />
                            <textarea id="note" name="note"  :value="old('note')" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type if there any notes there" autocomplete="note"></textarea>
                            <x-input-error :messages="$errors->get('note')" class="mt-2" />
                          </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-green-500 ml-2 focus:bg-green-700">
                                {{ __('SAVE') }}
                            </x-primary-button>
                            <x-primary-button type="reset" class="bg-red-500 ml-2 focus:bg-red-700">
                                {{ __('CANCEL') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>