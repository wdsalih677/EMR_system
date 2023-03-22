<?php

namespace App\Http\Livewire;
use App\Models\Ticket;


use Livewire\Component;

class PatientFollowUp extends Component
{
    public $currentStep = 1, $Nationalities ,$updateMode ,$successMessage;
    public $searchTicket;
    public $tickets,$name,$age,$teckit_id ,$residence_type ,$date_entry ,$final_diagnosis ,$section_id ,$treatment_diet;
    public function render()
    {
        return view('livewire.patient-follow-up');
    }

    //get patient first data
    public function getdata()
    {
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();
        if($tik)
        {
            $this->teckit_id = $tik->id;
            $this->name = $tik->name;
            $this->age = $tik->age;
            $this->date_entry =$tik->date_entry;
            $this->residence_type =$tik->patientsfinaldata->residence_type;
            $this->final_diagnosis =$tik->patientsfinaldata->final_diagnosis;
            $this->section_id =$tik->patientsfinaldata->section_id;
            $this->treatment_diet =$tik->patientsfinaldata->treatment_diet;


        }else{
            $this->name = "لا يوجد اسم بهذه التذكره";
            $this->age =  "لا يوجد عمر بهذه التذكره";
        }
    }
    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        $this->currentStep = 3;
    }

    public function submitForm(){


            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
    }
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
