<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->enum('status' , ['Active' , 'deActive'])->default('deActive');
            $table->string('role')->nullable()->default('customer'); // contributor / editor / Admin /
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'admin' ,
            'email' => 'admin@tarahsite.net' ,
            'phone' => '9372088771' ,
            'password' => bcrypt('@dmiNBloger' ),
        ]);
        DB::table('users')->insert([
            'name' => 'user1' ,
            'email' => 'user1@tarahsite.net' ,
            'phone' => '9372088771' ,
            'password' => bcrypt('159951@@' ),
        ]);
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
}
