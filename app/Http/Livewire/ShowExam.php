<?php

namespace App\Http\Livewire;


use App\Models\Ticket;
use Livewire\Component;

class ShowExam extends Component
{
    public $searchTicket;
    public $tickets,$name,$age,$teckit_id ,$provisional_diagnosis ,$examinations;
    public function render()
    {
        return view('livewire.show-exam');
    }
    /**
     * ============================================================================
     * ============== Component to show tichet & pre_diagnoses ====================
     * ============================================================================
     */
    public function getdata()
    {
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();
        if($tik)
        {
            $this->teckit_id = $tik->id;
            $this->name = $tik->name;
            $this->age = $tik->age;
            $this->examinations = $tik->pre_diagnoses->examinations;
            $this->provisional_diagnosis = $tik->pre_diagnoses->provisional_diagnosis;
        }else{
            $this->name = "لا يوجد اسم بهذه التذكره";
            $this->age =  "لا يوجد عمر بهذه التذكره";
            $this->examinations = "لا يوجد فحص بهذه التذكرة";
            $this->provisional_diagnosis = "لا يوجد تشخيص مبدئي بهذه التذكره";
        }
    }
}
