<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('risets', function (Blueprint $table) {
            $table->id();
            $table->string('publishdate');
            $table->string('titleID');
            $table->string('titleEN')->nullable();
            $table->string('img');
            $table->string('fileID');
            $table->string('fileEN');
            $table->text('descriptionID');
            $table->text('descriptionEN')->nullable();
            $table->longText('contentID')->nullable();
            $table->longText('contentEN')->nullable();
            $table->string('slug')->nullable();
            $table->string('category');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
