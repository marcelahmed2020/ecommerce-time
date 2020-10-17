<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(LaratrustSeeder::class);
       // $this->call(UsersTableSeeder::class);
       $user = \App\User::create([
           'first_name' => 'Super',
           'last_name' => 'Admin',
           'email' => 'super_admin@app.com',
           'password' => bcrypt('123456'),
       ]);
       $user->attachRole('super_admin');
     $sett =  \App\Settings::create(['site_name'=>'CMW','phone'=>0120254848,'facebook'=>'https://www.facebook.com','twitter'=>'https://www.twitter.com','instagram'=>'https://www.instagram.com','linkedin'=>'https://www.linkedin.com','email'=>'ex@gmail.com','description'=>'Lorem Desc','keywords'=>'we, asd, qaa, ifgdf','status'=>1,'message_maintenance'=>'we not here for now',
        'facebook_status'=> 1, 'adress'=> '20 St cairo ','instagram_status'=>1,'linkedin_status'=>1, 'twitter_status'=>1,'head_office'=>'20 St cairo Egypt',
        'latitude' => '556565656565',
        'longitude'=>'88888888','logo'=>0,'date'=>0
    ]);
//        $products = ['product 1', 'product 2','product 3', 'product 4','product 5', 'product 6','product 7', 'product 8'];
//         $products = ['product 9', 'product 10','product 11'];
//         foreach ($products as $product) {
//             \App\Product::create([
// //                'cat_id' => rand(2,3),
//                 'cat_id' => 4,
//                  'title' => $product,
//                 'short_desc' => $product . ' printer took a galley of type and scrambled it.',
//                 'desc' => $product . '  took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
//                 'purchasing_price' => rand(100,300),
//                 'price' => rand(300,1000),
//                 'stock' => rand(10,60),
//                 'rated' => rand(1,5),
//             ]);
//        }
   }
}
