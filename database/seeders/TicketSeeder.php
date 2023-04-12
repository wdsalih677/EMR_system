<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use App\Traits\generteID;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'name'=>'أحمد محمد صالح فرح',
            'identity_num'=>12345678901234,
            'address'=>'عطبره',
            'gender'=>1,
            'age'=>1,
            'age_type'=>1,
            'job'=>'طالب',
            'date_entry'=>2023/4/9,
            'phone_num'=>967705154,
            'ticket_num'=>generteID::IDGenerator(Ticket::class, 'ticket_num', 5, 'ATH'),
        ]);
    }
}
