<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after("name");
            $table->string('profile_image')->nullable()->after("username");
            $table->string('cover_image')->nullable()->after("profile_image");
            $table->string('city')->nullable()->after("cover_image");
            $table->string('country')->nullable()->after("city");
            $table->string('about_me')->nullable()->after("country");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('profile_image');
            $table->dropColumn('cover_image');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('about_me');
        });
    }
};
