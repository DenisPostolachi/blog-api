<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE statuses MODIFY COLUMN status_name ENUM('pending', 'success', 'error')");
    }

    public function down()
    {
        //
    }
};
