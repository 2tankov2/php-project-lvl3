<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'domains', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->dateTime('updated_at')->nullable();
                $table->dateTime('created_at')->nullable();
            }
        );
    }

    //id, name, updated_at, created_at.

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
