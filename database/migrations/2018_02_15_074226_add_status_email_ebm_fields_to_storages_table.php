<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusEmailEbmFieldsToStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storages', function (Blueprint $table) {
            $table->string('status')->after('min_quantity')->nullable();
            $table->string('email_send')->after('status')->nullable();
            $table->string('ebm_started')->after('email_send')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storages', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('email_send');
            $table->dropColumn('ebm_started');            
        });
    }
}
