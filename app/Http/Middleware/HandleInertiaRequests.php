<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function share(Request $request)
    {
        // $user = $request->user();
        // $user->load('persona');
        return array_merge(parent::share($request), [
            'auth' => [
                'user' =>$this->transformUser( $request->user()),
            ],
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                ];
            },
            'showingMobileMenu' => false,
        ]);
    }

    protected function transformUser($user){
        if($user){
            return [
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
                'persona'=>$user->persona,
                'roles'=>$user->getRoleNames()->toArray(),
                'permissions'=>$user->getAllPermissions()->pluck('name')->toArray(),
            ];
        }
        return null;
    }
}
