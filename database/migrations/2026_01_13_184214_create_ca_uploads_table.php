<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('ca_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->string('subject');
            $table->string('course'); // BCA/BBA
            $table->enum('ca_type', ['ca1','ca2','ca3','ca4']);
            $table->enum('upload_type', ['text','pdf']);
            $table->text('text_content')->nullable();
            $table->string('pdf_file')->nullable();
            $table->text('instructions')->nullable();
            $table->boolean('editable')->default(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('ca_uploads');
    }
};
