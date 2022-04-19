<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     schema="Contact",
 *     title="Контакт",
 *     @OA\Property(
 *         type="int",
 *         property="id",
 *         format="int64",
 *         title="ID контакта"
 *     ),
 *     @OA\Property(
 *         type="int",
 *         property="user_id",
 *         format="int64",
 *         title="ID пользователя, создавшего контакт"
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         title="Имя",
 *         type="string",
 *         example="Иван"
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         title="Фамилия",
 *         type="string",
 *         example="Иванов"
 *     ),
 *     @OA\Property(
 *         property="patronymic",
 *         title="Отчество",
 *         type="string",
 *         example="Иванович"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         title="Номер телефона",
 *         type="string",
 *         example="8 800 555 35 35"
 *     ),
 *     @OA\Property(
 *         type="boolean",
 *         property="is_favorite",
 *         title="В избранном?"
 *     )
 * )
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $patronymic
 */
class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'phone',
        'is_favorite',
    ];

    protected $casts = [
        'is_favorite' => 'boolean'
    ];

    protected $appends = ['full_name'];

    /**
     * User that created and manages this contact.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            fn() => str("$this->last_name $this->first_name $this->patronymic")->trim(),
        );
    }
}
