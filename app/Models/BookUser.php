<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BookUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BookUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookUser query()
 * @mixin \Eloquent
 */
class BookUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id'
    ];
}
