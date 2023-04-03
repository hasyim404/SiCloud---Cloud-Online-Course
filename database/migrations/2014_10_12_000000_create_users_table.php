<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name',45);
            $table->string('l_name',45);
            $table->string('no_telp',20)->unique();
            $table->string('username',15)->unique();
            $table->string('email',45)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['Pelajar','Mahasiswa','Pekerja','Lainnya']);
            $table->string('foto')->nullable();
            $table->enum('role', ['Base','Admin'])->default('Base');
            $table->boolean('isactive')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
