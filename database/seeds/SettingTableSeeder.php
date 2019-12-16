<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
        	'site_name' => 'First Laravel',
        	'contact_number' => '03419318186',
        	'contact_email' => 'nadeem@gmail.com',
        	'address' => 'G-11 Islamabad'
        ]);
    }
}
