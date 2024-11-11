<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Recipe extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel (opsional jika tabel dinamai sesuai dengan konvensi)
    protected $table = 'recipes';

    // Mendefinisikan kolom yang dapat diisi secara massal
    protected $fillable = [
        'title',
        'description',
        'postedBy',
        'userId',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
