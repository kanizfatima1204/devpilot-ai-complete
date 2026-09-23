<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void {Schema::create('ai_runs',function(Blueprint $table){$table->id();$table->string('task_type',40)->index();$table->string('title')->nullable();$table->text('requirement');$table->longText('output');$table->string('mode',20)->default('demo');$table->unsignedInteger('duration_ms')->nullable();$table->timestamps();});} public function down():void {Schema::dropIfExists('ai_runs');}};
