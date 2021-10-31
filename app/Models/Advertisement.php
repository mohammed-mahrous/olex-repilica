<?php

namespace App\Models;

use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'discription',
        'category_id',
        'user_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the user that owns the Advertisement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The roles that belong to the Advertisement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getOwnerAttribute()
    {
        return $this->User->name;
    }
    public function getCategoryNameAttribute()
    {
        return $this->Category->name;
    }

    public function filter(array $query)
    {
        $data = $this->all();
        if (in_array('tagslist', $query)) {
            $tags = $query['tagslist'];
            $data = $this->whereHas('tags', function (Builder $query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }
        if (in_array('users', $query)) {
            $users = $query['users'];
            $data = $data->whereHas('users', function (Builder $query) use ($users) {
                $query->whereIn('id', $users);
            });
        }
        if (in_array('categories', $query)) {
            $categories = $query['categories'];
            $data = $data->whereHas('category', function (Builder $query) use ($categories) {
                $query->whereIn('id', $categories);
            });
        }
        return $data;
    }
}