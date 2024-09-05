<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, MenuItem> $items
 * @property-read int|null $items_count
 * @method static Builder|Menu newModelQuery()
 * @method static Builder|Menu newQuery()
 * @method static Builder|Menu onlyTrashed()
 * @method static Builder|Menu query()
 * @method static Builder|Menu whereCreatedAt($value)
 * @method static Builder|Menu whereDeletedAt($value)
 * @method static Builder|Menu whereDescription($value)
 * @method static Builder|Menu whereId($value)
 * @method static Builder|Menu whereTitle($value)
 * @method static Builder|Menu whereUpdatedAt($value)
 * @method static Builder|Menu withTrashed()
 * @method static Builder|Menu withoutTrashed()
 */
class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}