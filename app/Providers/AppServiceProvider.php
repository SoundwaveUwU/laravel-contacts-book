<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Приложение Телефонная книга"
 * )
 *
 * @OA\Server(url="http://contacts-book.localhost")
 *
 * @OA\Schema(
 *     schema="PaginatorMetaLink",
 *     title="Ссылка в мета-информации пагинатора",
 *     @OA\Property(
 *         property="url",
 *         title="Адрес для кнопки",
 *         type="string",
 *         example="http://contacts-book.localhost/api/contact?page=2"
 *     ),
 *     @OA\Property(
 *         property="label",
 *         title="Надпись для кнопки для кнопки",
 *         type="string",
 *         @OA\Examples(example="number", value="2", summary="Номер страницы"),
 *         @OA\Examples(example="string", value="Вперёд &raquo;", summary="HTML код кнопки")
 *    ),
 *    @OA\Property(
 *        property="active",
 *        type="boolean",
 *        title="Активна ли сейчас кнопка"
 *    )
 * )
 *
 * @OA\Schema(
 *     schema="PaginatorLinks",
 *     title="Ссылки на близкие страницы с другими записями (следующая, предыдущая, первая и т.д.)",
 *     @OA\Property(
 *         property="first",
 *         title="Первая страница результатов",
 *         type="string",
 *         example="http://contacts-book.localhost/api/contact?page=1"
 *     ),
 *     @OA\Property(
 *         property="last",
 *         title="Последняя страница результатов",
 *         type="string",
 *         example="http://contacts-book.localhost/api/contact?page=5"
 *     ),
 *     @OA\Property(
 *         property="prev",
 *         title="Предыдущая страница результатов",
 *         type="string",
 *         example="http://contacts-book.localhost/api/contact?page=2"
 *     ),
 *     @OA\Property(
 *         property="next",
 *         title="Следующая страница результатов",
 *         type="string",
 *         example="http://contacts-book.localhost/api/contact?page=4"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="PaginatorMeta",
 *     title="Мета информация пагинатора",
 *     @OA\Property(
 *         property="current_page",
 *         type="int",
 *         format="int64",
 *         title="Текущая страница"
 *     ),
 *     @OA\Property(
 *         property="from",
 *         type="int",
 *         format="int64",
 *         title="С записи"
 *     ),
 *     @OA\Property(
 *         property="to",
 *         type="int",
 *         format="int64",
 *         title="По запись"
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="int",
 *         format="int64",
 *         title="Всего записей"
 *     ),
 *     @OA\Property(
 *         property="last_page",
 *         type="int",
 *         format="int64",
 *         title="Последняя страница"
 *     ),
 *     @OA\Property(
 *         property="links",
 *         type="array",
 *          @OA\Items(ref="#/components/schemas/PaginatorMetaLink")
 *     ),
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         title="Текущий путь"
 *     ),
 *     @OA\Property(
 *         property="per_page",
 *         type="int",
 *         format="int64",
 *         title="Выдаваемое количество строк за запрос"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="ValidationErrorResponse",
 *     title="Ошибки при валидации данных",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         title="Общее сообщение об ошибке"
 *     ),
 *     @OA\Property(
 *         property="errors",
 *         type="object",
 *         title="Ошибки в полях",
 *         @OA\Property(
 *             property="<...>",
 *             type="array",
 *             title="Поле",
 *             @OA\Items(type="string", example="Поле Телефон обязательно для заполнения.")
 *         ),
 *     ),
 * )
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
