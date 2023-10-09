<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Ticket;
use App\Models\Ward;
use Exception;
use Livewire\Component;
use PhpParser\ErrorHandler\Throwing;
use Throwable;

class PatientFollowUp extends Component
{
    public $currentStep = 1, $Nationalities ,$updateMode ,$successMessage;
    public $searchTicket;
    public $tickets,$name,$age,$teckit_id ,$residence_type ,$date_entry ,$final_diagnosis ,$section_id ,$treatment_diet ,$notes ,$ward_id;
    public $Pulse,$Pulse_time  ,$RR,$RR_time   ,$BP,$BP_time  ,$Temp,$Temp_time  ,$ABD,$ABD_time   ,$V_Bleeding,$V_Bleeding_time  ,$U_O_P,$U_O_P_time;
    public $createAccountError;


//start real time validation ticket
    protected $messages =[
        'searchTicket.required'=>'يجب إدخال رقم التذكره',
        'searchTicket.min'=>'يجب ان يبدأ رقم التذكره ب (-ATH) و لا يقل عن 5 ارقام',
        'age.required'=>'يجب إدخال رقم التذكره لعرض العمر',
        'name.required'=>'يجب إدخال رقم التذكره لعرض الإسم',
        'residence_type.required'=>'يجب إدخال رقم التذكره لعرض نوع إقامة المريض',
        'residence_type.min'=>'ليس للمريض إقامه',
        'date_entry.required'=>'يجب إدخال رقم التذكره لعرض تاريخ الدخول',
        'section_id.required'=>'ليس للمريض إقامه',
        'treatment_diet.required'=>'يجب إدخال رقم التذكره لعرض العلاج و التغذيه',
        'final_diagnosis.required'=>'يجب إدخال رقم التذكره لعرض التشخيص النهائي',

    ];

    protected $rules = [
        'searchTicket' =>'required|min:9',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName, [
            'searchTicket' =>'required|min:9',
        ]);
    }

    public function render()
    {
        return view('livewire.patient-follow-up');
    }
//end real time validation ticket


    //get patient first data
    public function getdata()
    {
        // try{
            $tik = Ticket::where('ticket_num',$this->searchTicket)->first();
            if($tik)
            {
                $this->teckit_id = $tik->id;
                $this->name = $tik->name;
                $this->age = $tik->age;
                $this->date_entry =$tik->date_entry;
                $this->residence_type = $tik->patientsfinaldata->residence_type == 2 ? "إقامه طويله" : "إقامه قصيره";
                $this->final_diagnosis =$tik->patientsfinaldata->final_diagnosis;
                $this->section_id =$tik->patientsfinaldata->sections->name;
                $this->treatment_diet =$tik->patientsfinaldata->treatment_diet;
            }else{
                $this->teckit_id ='';
                $this->name = '';
                $this->age = '';
                $this->date_entry ='';
                $this->residence_type = '';
                $this->final_diagnosis ='';
                $this->section_id ='';
                $this->treatment_diet ='';
            }
        // }
        // catch(Throwable $e){
        //     return false;
        // }

    }
    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'searchTicket' =>'required|min:9',
            'age'=>'required',
            'name'=>'required',
            'residence_type'=>'required|min:1',
            'date_entry'=>'required',
            'final_diagnosis'=>'required',
            'section_id'=>'required',
            'treatment_diet'=>'required',
        ]);
        $this->currentStep = 2;
    }
}
