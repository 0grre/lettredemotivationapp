<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Jobs\SendResetPasswordMailJob;
use App\Mail\VerifyEmailMail;
use App\Models\Letter;
use App\Models\User;
use App\Policies\LetterPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Mail\ResetPasswordMail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Letter::class => LetterPolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        ResetPassword::toMailUsing(function (User $user,string $token) {
            return new ResetPasswordMail($user, $token);
        });

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return new VerifyEmailMail($notifiable, $url);
        });
    }
}


