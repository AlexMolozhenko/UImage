<?php

namespace Database\Factories;

use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserImage>
 */
class UserImageFactory extends Factory
{
    protected $model = UserImage::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'image' => fake()->image('./storage/app/public/image',640, 480, 'people',false),
            'image' => fake()->unixTime()."_".rand().".png",
        ];
    }
}
