<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientForm extends Component
{
    public $action;
    public $patientId;
    public $patient;

    protected $rules = [
        'patient.first_name' => 'required|string|max:255',
        'patient.last_name' => 'required|string|max:255',
        'patient.email' => 'required|email|max:255',
        'patient.phone_number' => 'required|string|max:20|regex:/^\+?[0-9\-]{7,20}$/',
        'patient.nhs_number' => 'required|string|max:20',
        'patient.address' => 'required|string|max:255',
        'patient.date_of_birth' => 'required|date',
        'patient.sex' => 'required|string|in:male,female,other|max:10',
    ];

    public function mount($action, $patientId = null)
    {
        $this->action = $action;
        $this->patientId = $patientId;
        if ($this->action === 'edit' && $this->patientId) {
            $this->patient = Patient::findOrFail($this->patientId)->toArray();
        } else {
            $this->patient = [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'phone_number' => '',
                'nhs_number' => '',
                'address' => '',
                'date_of_birth' => '',
                'sex' => '',
            ];
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->action === 'create') {
            Patient::create($this->patient);
        } else {
            Patient::findOrFail($this->patientId)->update($this->patient);
        }

        $this->dispatch('refreshPatients');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.patient-form');
    }
}
