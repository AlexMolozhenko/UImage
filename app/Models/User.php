<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    protected $fillable = ['name', 'city'];

    public function userImages()
    {
        return $this->hasMany(UserImage::class);
    }
}
