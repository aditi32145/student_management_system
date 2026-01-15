<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void{
Schema::table('Students', function(Blueprint $table){
$table->date('dob')->nullable()->after('phone');
$table->string('email')->nullable()->unique()->after('dob');
$table->string('password')->nullable()->after('email');
});
    }
    public function down():void{
Schema::table('Students', function(Blueprint $table){
$table->dropColumn(['dob','email','password']);
    });
}
};
