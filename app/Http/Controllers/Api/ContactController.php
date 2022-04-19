<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/contact",
     *     tags={"Контакты"},
     *     operationId="contact_index",
     *     summary="Получение списка контактов",
     *     description="Получение списка контактов",
     *     security={{ "sanctum": {} }},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Список контактов текущего пользователя",
     *         @OA\JsonContent(
     *            @OA\Property(property="data",type="array",
     *               @OA\Items(ref="#/components/schemas/ContactResource")
     *            ),
     *            @OA\Property(property="meta",ref="#/components/schemas/PaginatorMeta"),
     *            @OA\Property(property="links",ref="#/components/schemas/PaginatorLinks")
     *         )
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        return ContactResource::collection(
            Contact::where('user_id', $request->user()->id)
                ->paginate()
        );
    }

    /**
     * @OA\Post(
     *     path="/api/contact",
     *     tags={"Контакты"},
     *     operationId="contact_store",
     *     summary="Создание нового контакта",
     *     description="Создание нового контакта",
     *     security={{ "sanctum": {} }},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/StoreContactRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Созданный контакт",
     *         @OA\JsonContent(
     *            @OA\Property(property="data",type="object",ref="#/components/schemas/ContactResource")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибки заполнения запроса",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     )
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param  StoreContactRequest  $request
     * @return ContactResource
     *
     * @throws AuthorizationException
     */
    public function store(StoreContactRequest $request): ContactResource
    {
        $this->authorize('create', Contact::class);

        $contact = new Contact();
        $contact->fill($request->validated());
        $contact->user()->associate($request->user());
        $contact->save();

        return new ContactResource($contact);
    }

    /**
     * @OA\Get(
     *     path="/api/contact/{id}",
     *     tags={"Контакты"},
     *     operationId="contact_show",
     *     summary="Получение контакта",
     *     description="Получение контакта",
     *     security={{ "sanctum": {} }},
     *     @OA\Parameter(
     *         required=true,
     *         name="id",
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Получение контакта",
     *         @OA\JsonContent(
     *            @OA\Property(property="data",type="object",ref="#/components/schemas/ContactResource")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Контакт не найден"
     *     )
     * )
     *
     * Display the specified resource.
     *
     * @param  Contact  $contact
     * @return ContactResource
     *
     * @throws AuthorizationException
     */
    public function show(Contact $contact): ContactResource
    {
        $this->authorize('view', $contact);

        return new ContactResource($contact);
    }

    /**
     * @OA\Put(
     *     path="/api/contact/{id}",
     *     tags={"Контакты"},
     *     operationId="contact_update",
     *     summary="Обновление контакта",
     *     description="Обновление контакта",
     *     security={{ "sanctum": {} }},
     *     @OA\Parameter(
     *         required=true,
     *         name="id",
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/UpdateContactRequest")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Обновленный контакт",
     *         @OA\JsonContent(
     *            @OA\Property(property="data",type="object",ref="#/components/schemas/ContactResource")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибки заполнения запроса",
     *         @OA\JsonContent(ref="#/components/schemas/ValidationErrorResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Контакт не найден"
     *     )
     * )
     *
     * Update the specified resource in storage.
     *
     * @param  UpdateContactRequest  $request
     * @param  Contact  $contact
     *
     * @return ContactResource
     *
     * @throws AuthorizationException
     */
    public function update(UpdateContactRequest $request, Contact $contact): ContactResource
    {
        $this->authorize('update', $contact);

        $contact->fill($request->validated());
        $contact->user()->associate($request->user());
        $contact->save();

        return new ContactResource($contact);
    }

    /**
     * @OA\Delete(
     *     path="/api/contact/{id}",
     *     tags={"Контакты"},
     *     operationId="contact_destroy",
     *     summary="Удаление контакта",
     *     description="Удаление контакта",
     *     security={{ "sanctum": {} }},
     *     @OA\Parameter(
     *         required=true,
     *         name="id",
     *         in="path",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Контакт успешно удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Контакт не найден"
     *     )
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param  Contact  $contact
     *
     * @return Response
     *
     * @throws AuthorizationException
     */
    public function destroy(Contact $contact): Response
    {
        $this->authorize('destroy', $contact);

        $contact->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
