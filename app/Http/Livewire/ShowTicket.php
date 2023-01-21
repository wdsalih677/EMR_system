<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class ShowTicket extends Component
{
    public $searchTicket;
    public $tickets,$name,$age,$teckit_id;
    public function render()
    {
        return view('livewire.show-ticket');
    }

    public function getdata()
    {
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();
        if($tik)
        {
            $this->teckit_id = $tik->id;
            $this->name = $tik->name;
            $this->age = $tik->age;
        }else{
            $this->name = "لا يوجد اسم بهذه التذكره";
            $this->age = "لا يوجد عمر بهذه التذكره";
        }
    }
}
