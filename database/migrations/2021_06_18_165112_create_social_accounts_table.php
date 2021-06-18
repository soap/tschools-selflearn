<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name')->comment('Provider name ex. facebook, line');
            $table->string('provider_user_id');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foriegn('user_id')->reference('id')->on('')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_accounts');
    }
}
