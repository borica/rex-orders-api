<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $id
 * @property string $menu_id
 * @property string $title
 * @property string|null $description
 * @property string|null $image_url
 * @property string $price
 * @property int $prep_time_minutes
 * @property int $portion_size
 * @property bool $disabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Menu $menu
 * @method static Builder|MenuItem newModelQuery()
 * @method static Builder|MenuItem newQuery()
 * @method static Builder|MenuItem onlyTrashed()
 * @method static Builder|MenuItem query()
 * @method static Builder|MenuItem whereCreatedAt($value)
 * @method static Builder|MenuItem whereDeletedAt($value)
 * @method static Builder|MenuItem whereDescription($value)
 * @method static Builder|MenuItem whereDisabled($value)
 * @method static Builder|MenuItem whereId($value)
 * @method static Builder|MenuItem whereImageUrl($value)
 * @method static Builder|MenuItem whereMenuId($value)
 * @method static Builder|MenuItem wherePortionSize($value)
 * @method static Builder|MenuItem wherePrepTimeMinutes($value)
 * @method static Builder|MenuItem wherePrice($value)
 * @method static Builder|MenuItem whereTitle($value)
 * @method static Builder|MenuItem whereUpdatedAt($value)
 * @method static Builder|MenuItem withTrashed()
 * @method static Builder|MenuItem withoutTrashed()
 */
class MenuItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'menu_id',
        'title',
        'description',
        'image_url',
        'price',
        'prep_time_minutes',
        'portion_size',
        'disabled',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}