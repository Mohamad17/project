<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copans', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('amount');
            $table->tinyInteger('amount_type')->default(0)->comment('0=>percent , 1=>price');
            $table->unsignedBigInteger('discount_ceiling')->nullable();
            $table->tinyInteger('type')->default(0)->comment('0=>each user can use one time , 1=>only one user can use one time');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->useCurrent();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('copans');
    }
}