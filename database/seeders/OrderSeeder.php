<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
for($i = 0;$i <= 200;$i++){
    $order = new Order;
    $order->image = '1.jpg';
    $order->quantity = '2';
    $order->note = 'laksdlkfjsda';
    $order->status = 1;
    $order->user_id = 1;
    $order->delivery_option_id = 1;
  
    $order->created_at = $faker->dateTimeThisYear();
    $order->save();

}
   
    }
}
