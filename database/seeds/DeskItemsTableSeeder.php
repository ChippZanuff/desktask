<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class DeskItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all()->toArray();
        $images = Storage::disk('public')->files('images/');
        foreach ($images as &$image) {
            $image = url('storage/' . $image);
        }

        for ($i = 0; $i < count($images); $i++) {
            DB::table('desk_items')->insert([
                'title' => $faker->title(),
                'user_id' => $users[array_rand($users, 1)]['id'],
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image_path' => $images[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
