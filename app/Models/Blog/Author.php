<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $fillable = ['name', 'email', 'photo', 'bio', 'facebook_link', 'instagram_link', 'x_link'];

    // /** @return HasMany<Post> */
    // public function posts(): HasMany
    // {
    //     return $this->hasMany(Post::class, 'author_id');
    // }

    public function getAuthorPhoto()
    {
        if (!$this->photo) {
            return "https://ui-avatars.com/api/?name=" . urlencode($this->name) . "&background=be185b&color=fff";
        }

        return asset('storage/images/author/' . $this->photo);
    }
}
