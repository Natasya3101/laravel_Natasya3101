<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('patients', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('hospital_id')->constrained('hospitals')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('patients'); }
};
