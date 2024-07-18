<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Patient;
use Livewire\WithPagination;

class PatientList extends Component
{
    use WithPagination;

    public $isOpen = false;
    public $action = '';
    public $patientId = null;
    public $search = '';
    public $perPage = 5;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = [
        'refreshPatients' => '$refresh',
        'closeModal' => 'closeModal',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function submitSearch()
    {
        $this->dispatch('updatedSearch');
    }
    public function closeModal()
    {
        $this->isOpen = false;
        $this->action = '';
        $this->patientId = null;
    }

    public function openModal($action, $patientId = null)
    {
        $this->isOpen = true;
        $this->action = $action;
        $this->patientId = $patientId;
    }

    public function delete($id)
    {
        Patient::find($id)->delete();
    }

    public function render()
    {
        $patients = Patient::where('first_name', 'like', "%{$this->search}%")
            ->orWhere('last_name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('nhs_number', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.patient-list', [
            'patients' => $patients,
        ]);
    }
}
