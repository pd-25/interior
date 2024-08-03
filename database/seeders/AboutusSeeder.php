<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aboutus;
class AboutusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutus::create([
            'description'                 => '<h2>About Our <span>I INTERIOFY</span></h2>
                                            <p>Interior design is defined as the professional and comprehensive practice of creating an interior environment that addresses, protects, and responds to human need(s).</p>
                                            <p>Interior design is the art and science of enhancing the interior of a building to achieve a healthier and more aesthetically pleasing environment for the people using the space. An interior designer is someone who plans, researches, coordinates, and manages such enhancement projects.</p>
                                            <ul>
                                                <li>Architectural and Plan</li>
                                                <li>interior decoration</li>
                                                <li>Design, Plan & Architecture</li>
                                                <li>Electrical and Lighting work</li>
                                                <li>Plumbing Work</li>
                                                <li>Flooring Work</li>
                                            </ul>',
            'image'                       => '',
            'title_one'                   => 'What we can do?',
            'title_one_description'       => '<p>We put a strong focus on the needs of your business to figure out solutions that best fits your demand and nail it.</p>',
            'title_two'                   => 'Become our partners?',
            'title_two_description'       => '<p>Our preventive and progressive approach will help you take the lead while addressing possible threats in managing data.</p>',
            'title_three'                 => 'Need a hand?',
            'title_three_description'     => '<p>Our support team is available 24/7 a day, 7 days a week and can get ready for solving any of your situational rising problems.</p>',
            'title_one_faq'               => 'Item 1',
            'faq_item_one_description'    => '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven,t heard of them accusamus labore sustainable VHS. </p>',
            'title_two_faq'               => 'Item 2',
            'faq_item_two_description'    => '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven,t heard of them accusamus labore sustainable VHS. </p>',
            'title_three_faq'             => 'Item 3',
            'faq_item_three_description'  => 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. ',
        ]);
    }
}
