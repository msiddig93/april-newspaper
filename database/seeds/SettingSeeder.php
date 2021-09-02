<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'app_name',
            'value' => 'April News'
        ]);

        Setting::create([
            'name' => 'app_email',
            'value' => 'mohamed915@gmail.com'
        ]);

        Setting::create([
            'name' => 'app_logo',
            'value' => 'assets/images/bg/login.jpg'
        ]);
    }


}
