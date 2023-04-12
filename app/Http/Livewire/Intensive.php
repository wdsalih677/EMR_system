<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;

class Intensive extends Component
{
    public $searchTicket;
    public $tickets,$name,$age,$teckit_id ,$final_diagnosis;
    public function render()
    {
        return view('livewire.intensive');
    }

    public function getdata()
    {
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();;
        if($tik)
        {
            $this->teckit_id = $tik->id;
            $this->name = $tik->name;
            $this->age = $tik->age;
            $this->final_diagnosis = $tik->patientsfinaldata->final_diagnosis;

        }else{
            $this->name = "لا يوجد اسم بهذه التذكره";
            $this->age =  "لا يوجد عمر بهذه التذكره";
            $this->final_diagnosis = "لا توجد نتائج بهذه التذكرة";

        }
    }
}
