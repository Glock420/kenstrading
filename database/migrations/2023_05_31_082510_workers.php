<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id('workerid');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('acctype')->default("Regular");
            $table->timestamps();
        });

        DB::table('workers')->insert([
            'fullname' => 'KensTrading',
            'email' => 'kenstrading@gmail.com',
            'password' => bcrypt('admin123'),
            'acctype' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
