<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class UserImage extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    protected $fillable = ['image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
