<?php
namespace Tests\Unit;
use App\Services\AiEmployeeService;
use Tests\TestCase;
class AiEmployeeServiceTest extends TestCase {
 public function test_demo_mode_returns_structured_output():void {config(['ai_employee.demo_mode'=>true]);$result=app(AiEmployeeService::class)->run('database','Create an LMS database with courses and lessons.');$this->assertSame('demo',$result['mode']);$this->assertStringContainsString('Database Schema Plan',$result['output']);$this->assertGreaterThanOrEqual(0,$result['duration_ms']);}
}
