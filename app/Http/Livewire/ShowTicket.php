<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class ShowTicket extends Component
{
    public $searchTicket;
    public $tickets,$name,$age;
    public function render()
    {
        return view('livewire.show-ticket');
    }

    public function getdata()
    {
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();
        if($tik)
        {
            $this->name = $tik->name;
            $this->age = $tik->age;
        }else{
            $this->name = "لا توجد تذكره بهذا الرقم";
            $this->age = "لا توجد تذكره بهذا الرقم";
        }
    }
}
