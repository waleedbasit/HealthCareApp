<form wire:submit.prevent="save">
    <div class="grid grid-cols-1 gap-6">
        @foreach(['first_name', 'last_name', 'email', 'phone_number', 'nhs_number', 'address'] as $field)
            <div>
                <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                <input type="text" id="{{ $field }}" wire:model.defer="patient.{{ $field }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error("patient.$field") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endforeach
        <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input type="date" id="date_of_birth" wire:model.defer="patient.date_of_birth" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('patient.date_of_birth') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="sex" class="block text-sm font-medium text-gray-700">Sex</label>
            <select id="sex" wire:model.defer="patient.sex" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            @error('patient.sex') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ $action === 'create' ? 'Save' : 'Update' }}</button>
        </div>
    </div>
</form>
