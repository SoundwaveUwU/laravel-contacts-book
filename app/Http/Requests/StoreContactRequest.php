<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StoreContactRequest",
 *     title="Запрос на создание контакта",
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
 */
class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'patronymic' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'is_favorite' => ['boolean'],
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => __('First name'),
            'last_name' => __('Last name'),
            'patronymic' => __('Patronymic'),
            'phone' => __('Phone'),
            'is_favorite' => __('Is favorite?'),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_favorite' => $this->has('is_favorite')
        ]);
    }
}
