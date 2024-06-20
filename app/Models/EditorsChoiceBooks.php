<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\EditorsChoiceBooks
 *
 * @property int $id
 * @property int $book_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book|null $book
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks query()
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EditorsChoiceBooks whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EditorsChoiceBooks extends Model
{
    use HasFactory;

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
