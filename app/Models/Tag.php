<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be unique.
     *
     * @var array<int, string>
     */
    protected $rules = [
        'name' => 'required|unique:tags|max:255',
    ];

    /**
     * The posts that belong to the tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
