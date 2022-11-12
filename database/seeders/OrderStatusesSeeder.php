<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            ["id"=>"1","name_ar"=>"منتظر","name_en"=>"Pending"],
            ["id"=>"2","name_ar"=>"قيد المراجعة","name_en"=>"In Progress"],
            ["id"=>"3","name_ar"=>"قيد الشحن","name_en"=>"Shipping"],
            ["id"=>"4","name_ar"=>"تم التوصيل","name_en"=>"Delivered"],
            ["id"=>"5","name_ar"=>"ملغي","name_en"=>"Canceled"],
            ["id"=>"6","name_ar"=>"مرفوض","name_en"=>"Rejected"],
        ]);
    }
}
