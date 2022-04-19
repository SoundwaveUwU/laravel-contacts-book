<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SanctumController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/sanctum/token",
     *     tags={"Получение токена авторизации"},
     *     summary="Получение токена авторизации",
     *     operationId="sanctum_token",
     *     description="Получение токена авторизации",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Запрос на вход",
     *         @OA\JsonContent(
     *            @OA\Property(property="email",type="string",example="your@email.com"),
     *            @OA\Property(property="password",type="string",example="*******"),
     *            @OA\Property(property="device_name",type="string",example="iPhone")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *            @OA\Property(property="token",type="string",example="asdsad<...>"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Данные реквизиты не соотносятся с учетными записями в нашей базе."
     *     )
     * )
     *
     * @throws ValidationException
     */
    public function token(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken,
        ]);
    }
}
