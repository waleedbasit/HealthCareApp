<div>
    <div class="mb-4">
        <input wire:model.debounce.300ms="search"
               wire:keydown.enter="submitSearch"
               type="text"
               placeholder="Search patients..."
               class="w-full px-4 py-2 border rounded-md"
        >
    </div>

    <div class="flex justify-between items-center mb-4">
        <button wire:click="openModal('create')" class="bg-blue-500 text-white px-4 py-2 rounded">Add Patient</button>
    </div>

    @foreach ($patients as $patient)
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-xl font-bold">{{ $patient->first_name }} {{ $patient->last_name }}</h2>
            <p><strong>Email:</strong> {{ $patient->email }}</p>
            <p><strong>Phone:</strong> {{ $patient->phone_number }}</p>
            <p><strong>NHS Number:</strong> {{ $patient->nhs_number }}</p>
            <p><strong>Address:</strong> {{ $patient->address }}</p>
            <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth }}</p>
            <p><strong>Sex:</strong> {{ $patient->sex }}</p>
            <div class="flex justify-end mt-5">
                <button wire:click="openModal('edit', {{ $patient->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center mr-2">
                    <i class="fas fa-edit mr-2"></i> Edit
                </button>
                <button wire:click="delete({{ $patient->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i> Delete
                </button>
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $patients->links() }}
    </div>

    @if($isOpen)
        <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center" x-data @click.self="$wire.closeModal()">
            <div class="bg-white p-6 rounded-lg w-1/2" @click.stop>
                <h2 class="text-xl font-bold mb-4">{{ $action === 'create' ? 'Add Patient' : 'Edit Patient' }}</h2>
                <livewire:patient-form :action="$action" :patient-id="$patientId" />
            </div>
        </div>
    @endif
</div>
