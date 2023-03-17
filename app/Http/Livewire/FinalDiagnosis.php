<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class FinalDiagnosis extends Component
{
    public $searchTicket;
    public $tickets,$name,$age,$teckit_id ,$test_results;

    public function render()
    {
        return view('livewire.final-diagnosis');
    }
    /**
     * ============================================================================
     * ============== Component to show tichet & examination results ==============
     * ============================================================================
     */
    public function getdata()
    {
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();;
        if($tik)
        {
            $this->teckit_id = $tik->id;
            $this->name = $tik->name;
            $this->age = $tik->age;
            $this->test_results = $tik->examinations->test_results;

        }else{
            $this->name = "لا يوجد اسم بهذه التذكره";
            $this->age =  "لا يوجد عمر بهذه التذكره";
            $this->test_results = "لا توجد نتائج بهذه التذكرة";

        }
    }
}
