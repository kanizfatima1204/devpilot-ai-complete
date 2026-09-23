<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AiRun extends Model { protected $fillable=['task_type','title','requirement','output','mode','duration_ms']; protected $casts=['duration_ms'=>'integer']; }
