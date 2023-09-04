<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserImage;
use Cassandra\Date;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserImageSeeder extends Seeder
{
    const COUNT_IMAGES = 100000;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        for ($i = 0; $i < self::COUNT_IMAGES;) {
            $randomUser = $users->random();

            if ($i < 99990) {
                $randomCount = rand(1, 10);
            } else {
                $randomCount = 1;
            }

             UserImage::factory()->count($randomCount)->create(['user_id' => $randomUser->id]);

            $i += $randomCount;
        }
    }
}
