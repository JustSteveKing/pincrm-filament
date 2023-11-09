<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $name
 * @property null|string $email
 * @property null|string $phone
 * @property null|string $address
 * @property null|string $city
 * @property null|string $region
 * @property null|string $country
 * @property null|string $postal_code
 * @property string $user_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property null|CarbonInterface $deleted_at
 * @property User $user
 * @property Collection<Contact> $contacts
 */
final class Organization extends Model
{
    use HasFactory;
    use HasUlids;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'region',
        'country',
        'postal_code',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(
            related: Contact::class,
            foreignKey: 'organization_id',
        );
    }
}
