<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Blog
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $blog_category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\BlogCategory $category
 * @method static \Illuminate\Database\Query\Builder|\App\Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Blog whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Blog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Blog whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Blog whereRestaurantCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Blog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Blog extends Model
{
    protected $fillable = [
        'name', 'description', 'blog_category_id'
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class);
    }

}
