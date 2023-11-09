<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property null|string $email
 * @property null|string $phone
 * @property null|string $address
 * @property null|string $city
 * @property null|string $region
 * @property null|string $country
 * @property null|string $postal_code
 * @property string $organization_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property null|CarbonInterface $deleted_at
 * @property Organization $organization
 */
final class Contact extends Model
{
    use HasFactory;
    use HasUlids;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'region',
        'country',
        'postal_code',
        'organization_id',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            related: Organization::class,
            foreignKey: 'organization_id',
        );
    }
}
