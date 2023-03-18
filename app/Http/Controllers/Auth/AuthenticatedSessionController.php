<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    protected $guard = 'web';
    public function __construct(Request $request)
    {
        if ($request->is('admin/*')){
            $this->guard = 'admin';
        }
        if ($request->is('coordinator/*')){
            $this->guard = 'coordinator';
        }
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        $view = 'auth.login';
        if ($this->guard == 'admin'){
            $view = 'auth.login_a';
        }
        if ($this->guard == 'coordinator'){
            $view = 'auth.login_c';
        }
        return view($view);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate($this->guard);

        $request->session()->regenerate();

        $backRoute = RouteServiceProvider::HOME;
        if ($this->guard == 'admin'){
            $backRoute = 'admin/dashboard';
        }
        if ($this->guard == 'coordinator'){
            $backRoute = 'coordinator/dashboard';
        }

        return redirect()->intended($backRoute);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $redirect = '/';

        if ($this->guard == 'admin'){
            $redirect = 'admin/login';
        }

        if ($this->guard == 'coordinator'){
            $redirect = 'coordinator/login';
        }
        return redirect($redirect);
    }
}
