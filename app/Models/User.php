<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class User extends Model
{
    use HasFactory;

    const CountUserImage  = 25;

    protected $fillable = ['name', 'city'];

    public function userImages()
    {
        return $this->hasMany(UserImage::class);
    }

    static public function getUsersFromNum($page,$order ,$perPage = self::CountUserImage) {

        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });

        return self::select('id', 'name', 'city')
            ->withCount(['userImages'])
            ->orderBy('user_images_count', $order)
            ->paginate($perPage);
    }

    static function getUser($name,$city){
        return User::where('name', $name)->where('city', $city)->first();
    }
}
