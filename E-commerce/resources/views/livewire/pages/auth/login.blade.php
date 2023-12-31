<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new  class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        $this->performPostAuthenticationTasks();
    }

    /**
     * Perform tasks after successful authentication.
     */
    private function performPostAuthenticationTasks(): void
    {
        Session::regenerate();

        $redirectTo = $this->getRedirectToPath();

        $this->redirect($redirectTo, navigate: true);
    }

    /**
     * Get the redirection path based on the user's 'utype'.
     *
     * @return string
     */
    private function getRedirectToPath(): string
    {
        $utype = auth()->user()->utype;

        // Customize the redirection based on the user's 'utype'
        switch ($utype) {
            case 'ADM':
                return route('dashboard.index'); // Change 'adm.dashboard' to your actual admin dashboard route
            case 'USR':
                return route('home.index'); // Change 'home.index' to your actual user dashboard route
            default:
                return RouteServiceProvider::HOME;
        }
    }
}; ?>





    

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Login
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <form wire:submit="login">
                                            <div class="form-group">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                                            </div>
                                            <div class="form-group">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                    <label for="remember" class="form-check-label">
                                                        <input wire:model="form.remember" id="remember" type="checkbox" class="form-check-input" name="remember">
                                                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                                    </label>
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                <a class="text-muted" href="{{ route('password.request') }}" wire:navigate>{{ __('Forgot your password?') }}</a>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">  {{ __('Log in') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                                <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

