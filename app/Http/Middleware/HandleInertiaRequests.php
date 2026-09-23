<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Inertia\Middleware;
class HandleInertiaRequests extends Middleware {
    protected $rootView = 'app';
    public function share(Request $request): array {
        return array_merge(parent::share($request), [
            'flash' => [
                'ai_run' => fn () => $request->session()->get('ai_run'),
            ],
        ]);
    }
}
