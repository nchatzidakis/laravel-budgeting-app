<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('site_id')
                ->constrained('sites')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('paid_to')
                ->constrained('accounts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('paid_from')
                ->constrained('accounts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('notes')->nullable();
            $table->decimal('amount', 9,2);
            $table->dateTime('transaction_at');
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
        Schema::dropIfExists('transfers');
    }
}
