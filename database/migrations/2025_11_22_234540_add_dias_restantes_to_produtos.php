<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('produtos', function (Blueprint $table) {
        if (!Schema::hasColumn('produtos', 'dias_restantes')) {
            $table->integer('dias_restantes')->nullable()->after('data_vencimento');
        }
    });
}


public function down()
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->dropColumn('dias_restantes');
    });
}

};
