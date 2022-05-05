<?php

namespace App\Models;

use App\Filters\AdFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Ad extends Model
{
    use HasFactory;

    public function scopeFilter(Builder $builder, $request)
    {
        return (new AdFilter($request))->filter($builder);
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', '=', 1);
        });
    }

    public function comments()
    {

        return $this->hasMany(Comment::class, 'ad_id', 'id');

    }

    public function type()
    {

        return $this->hasOne(Type::class, 'id', 'type_id');

    }

    public function manufacturer()
    {

        return $this->hasOne(Manufacturer::class, 'id', 'manufacturer_id');

    }

    public function carModel()
    {

        return $this->hasOne(CarModel::class, 'id', 'model_id');

    }

    public function color()
    {

        return $this->hasOne(Color::class, 'id', 'color_id');

    }

    public function user()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }

}
