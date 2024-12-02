<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'hero_title', 'value' =>'Have a Medical Question?'],
            ['key' => 'hero_description', 'value' =>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque, laborum saepe enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur cum iure quod facere.'],
            ['key' => 'hero_image', 'value' =>'hero_image.jpg'],
            ['key' => 'service_image_1', 'value' =>'service_image_1.svg'],
            ['key' => 'service_title_1', 'value' =>'everything you need is found at VCare.'],
            ['key' => 'service_description_1', 'value' =>'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.'],
            ['key' => 'service_image_2', 'value' =>'service_image_2.svg'],
            ['key' => 'service_title_2', 'value' =>'everything you need is found at VCare.'],
            ['key' => 'service_description_2', 'value' =>'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.'],
            ['key' => 'service_image_3', 'value' =>'service_image_3.svg'],
            ['key' => 'service_title_3', 'value' =>'everything you need is found at VCare.'],
            ['key' => 'service_description_3', 'value' =>'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.'],
            ['key' => 'service_image_4', 'value' =>'service_image_4.svg'],
            ['key' => 'service_title_4', 'value' =>'everything you need is found at VCare.'],
            ['key' => 'service_description_4', 'value' =>'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.'],
            ['key' => 'app_image', 'value' =>'app_image.jpg'],
            ['key' => 'app_title', 'value' =>'download the application now'],
            ['key' => 'app_description', 'value' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus facere eveniet in id, quod explicabo minus ut, sint possimus, fuga voluptas. Eius molestias eveniet labore ullam magnam sequi possimus quaerat!'],
            ['key' => 'footer_title', 'value' =>'About Us'],
            ['key' => 'footer_description', 'value' =>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque, laborum saepe enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur cum iure quod facere'],
        ];

        Setting::insert($settings);
    }
}
