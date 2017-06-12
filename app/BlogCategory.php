<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BlogCategory
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Blog[] $blogs
 * @method static \Illuminate\Database\Query\Builder|\App\BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlogCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlogCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BlogCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogCategory extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function blogs() {
        return $this->hasMany(Blog::class);
    }
}
