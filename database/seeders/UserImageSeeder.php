<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $toInsert = [];

        foreach ($users as $user) {
            $imageData = UserImage::factory()->make(['user_id' => $user->id])->toArray();
            $toInsert[] = $imageData;
        }

        for ($i = 0; $i < 90000;) {
            $randomUser = $users->random();

            if ($i <= 89990) {
                $randomCount = rand(1, 10);
            } else {
                $randomCount = 1;
            }

            for ($j = 0; $j < $randomCount; $j++) {
                $imageData = UserImage::factory()->make(['user_id' => $randomUser->id])->toArray();
                $toInsert[] = $imageData;
            }

            $i += $randomCount;
        }

        $chunks = array_chunk($toInsert, 500);

        foreach ($chunks as $chunk) {
            DB::table('user_images')->insert($chunk);
        }
    }
}
