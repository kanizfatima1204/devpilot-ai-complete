<?php
namespace Tests\Feature;
use App\Models\AiRun;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class AiEmployeeTest extends TestCase {
 use RefreshDatabase;
 public function test_dashboard_is_available():void {$this->get('/')->assertOk();}
 public function test_employee_run_creates_a_run_in_demo_mode():void {config(['ai_employee.demo_mode'=>true]);$response=$this->post('/ai-employee/run',['task_type'=>'requirement','title'=>'LMS analysis','requirement'=>'Build an LMS with courses, quizzes and student progress.']);$response->assertRedirect();$this->assertDatabaseHas('ai_runs',['task_type'=>'requirement','mode'=>'demo']);$this->assertSame(1,AiRun::count());}
}
