<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('first_name')->comment('Имя');
            $table->string('last_name')
                ->nullable()
                ->comment('Фамилия');
            $table->string('patronymic')
                ->nullable()
                ->comment('Отчество');

            $table->string('phone', 20)
                ->comment('Номер телефона');

            $table->boolean('is_favorite')
                ->default(false)
                ->comment('Находится в избранных');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
