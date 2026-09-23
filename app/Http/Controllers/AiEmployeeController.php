<?php
namespace App\Http\Controllers;
use App\Models\AiRun;
use App\Services\AiEmployeeService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class AiEmployeeController extends Controller {
 public function __construct(private readonly AiEmployeeService $aiEmployee){}
 public function index():Response {return Inertia::render('Dashboard',['runs'=>AiRun::query()->latest()->limit(8)->get(['id','task_type','title','requirement','output','mode','duration_ms','created_at']),'config'=>['demo_mode'=>(bool)config('ai_employee.demo_mode')||blank(config('ai_employee.api_key')),'model'=>config('ai_employee.model')]]);}
 public function run(Request $request){$data=$request->validate(['task_type'=>['required','string','in:requirement,database,api,bug,vue,crud,documentation,testing'],'requirement'=>['required','string','min:10','max:12000'],'title'=>['nullable','string','max:120']]); try{$result=$this->aiEmployee->run($data['task_type'],$data['requirement']);$run=AiRun::create(['task_type'=>$data['task_type'],'title'=>$data['title']?:ucfirst($data['task_type']).' task','requirement'=>$data['requirement'],'output'=>$result['output'],'mode'=>$result['mode'],'duration_ms'=>$result['duration_ms']]);return back()->with('ai_run',['id'=>$run->id,'task_type'=>$run->task_type,'title'=>$run->title,'requirement'=>$run->requirement,'output'=>$run->output,'mode'=>$run->mode,'duration_ms'=>$run->duration_ms,'created_at'=>$run->created_at->toISOString()]);}catch(\Throwable $e){report($e);return back()->withErrors(['ai'=>'AI Employee failed: '.$e->getMessage()]);}}
 public function destroy(AiRun $run){$run->delete();return back();}
}
