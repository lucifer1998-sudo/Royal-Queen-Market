<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInviteNotesToLongString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invites', function (Blueprint $table) {
            $table->longText('notes')->nullable()->change();
            $table->string('validation_number')->nullable();
            $table->longText('temp_pgp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invites', function (Blueprint $table) {
            $table->string('notes')->nullable()->change();
            $table->dropColumn('validation_number');
            $table->dropColumn('temp_pgp');
        });
    }
}
