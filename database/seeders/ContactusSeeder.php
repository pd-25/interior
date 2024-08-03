<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contactus;
class ContactusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contactus::create([
            'location'     => '1,St Floor, Vincent Plaza, Kuzhithurai 629 163',
            'email1'       => 'Sales@Smarteyeapps.Com',
            'email2'       => 'Support@Smarteyeapps.Com',
            'phone1'       => '+91234443434443',
            'phone2'       => '+04134344434343',
            'location_map' => '<iframe
                                    class="pb-0"
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15659.16664494769!2d77.32095495000002!3d11.1288885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1660839868672!5m2!1sen!2sin"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>',
        ]);


    }
}
