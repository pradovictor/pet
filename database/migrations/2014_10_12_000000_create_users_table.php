<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('usuarios', function (Blueprint $table) {
      $table->engine = 'MyISAM';
      $table->increments('id');
      $table->string('name');
      $table->string('email', 128)->unique();
      $table->string('password');
      $table->string('nit', 10)->nullable();
      $table->rememberToken();
      $table->softDeletes();
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
    Schema::dropIfExists('usuarios');
  }
}
