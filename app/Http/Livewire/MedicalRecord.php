<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class MedicalRecord extends Component
{
    public $searchTicket,$teckit_id,$name,$final_diagnosis,$test_results,$age,$date_entry,$treatment_diet;
    public $operationName,$Ansesthesia,$OperationProcedures;
    public function render()
    {
        return view('livewire.medical-record');
    }
    public function getdata(){
        $tik = Ticket::where('ticket_num',$this->searchTicket)->first();
        if($tik){
            $this->teckit_id = $tik->id;
            $this->name = $tik->name;
            $this->age = $tik->age;
            $this->date_entry =$tik->date_entry;
            $this->test_results = $tik->examinations->test_results ?? 'لاتوجد نتائج فحص';
            $this->final_diagnosis = $tik->patientsfinaldata->final_diagnosis ?? 'لا يوجد تشخيص نهائي';
            $this->treatment_diet = $tik->patientsfinaldata->treatment_diet ?? 'لا يوجد علاج و تغزيه';

            $this->operationName = $tik->oprations->operationName ?? 'لاتوجد عمليه' ;
            $this->Ansesthesia = $tik->oprations->Ansesthesia ?? 'لاتوجد عمليه';
            $this->OperationProcedures = $tik->oprations->OperationProcedures ?? 'لاتوجد عمليه';

        }else{
            $this->teckit_id           ='لاتوجد';
            $this->name                ='لاتوجد';
            $this->age                 ='لاتوجد';
            $this->date_entry          ='لاتوجد';
            $this->test_results        ='لاتوجد';
            $this->final_diagnosis     ='لاتوجد';
            $this->treatment_diet      ='لاتوجد';
            $this->operationName       ='لاتوجد';
            $this->Ansesthesia         ='لاتوجد';
            $this->OperationProcedures ='لاتوجد';
        }
    }
}
