<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Palestine/Gaza',
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','LE','SAR'],
            'default_currency' => 'USD',
            'store_email' => 'admin@gmail.com',
            'search_engine' => 'mysql',
            'local_shipping_cots' => 0,
            'outer_shipping_cots' => 0,
            'free_shipping_cots' => 0,
            'translatable' => [
                'store_name' => 'متجر غيمة',
                'free_shipping_label' => 'توصيل مجاني',
                'local_label' => 'توصيل داخلي',
                'outer_label' => 'توصيل خارجي',
            ],

        ]);
    }
}
