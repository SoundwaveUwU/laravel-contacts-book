<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @OA\Schema(
 *     schema="ContactResource",
 *     title="Ответ по Контакту",
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
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         title="Дата создания",
 *         type="datetime",
 *         example="2022-04-19T07:05:40.000000Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         title="Дата обновления",
 *         type="datetime",
 *         example="2022-04-19T07:05:40.000000Z"
 *     ),
 *     @OA\Property(
 *         property="full_name",
 *         title="Полное имя",
 *         type="string",
 *         example="Иванов Иван Иванович"
 *     )
 * )
 */
class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
