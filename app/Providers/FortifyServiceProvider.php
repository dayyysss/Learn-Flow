<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(
            LoginResponse::class,
            new class implements LoginResponse {
            public function toResponse($request)
            {
                $login = $request->input('login');
                $password = $request->password;

                // Tentukan kredensial berdasarkan input login (email atau name)
                $credentials = filter_var($login, FILTER_VALIDATE_EMAIL)
                    ? ['email' => $login, 'password' => $password]
                    : ['name' => $login, 'password' => $password];

                // Coba autentikasi
                if (auth()->attempt($credentials)) {
                    // Cek apakah role_id yang diperbolehkan (2, 3, 4)
                    if (!in_array(auth()->user()->role_id, [2, 3, 4])) {
                        auth()->logout(); // Langsung logout jika role tidak sesuai
                        return redirect()->route('login')->withErrors([
                            'login' => 'Anda tidak memiliki izin untuk login.',
                        ]);
                    }

                    notify()->success('Login berhasil!', 'Selamat datang!');
                    return redirect()->route('dashboard');
                }

                // Jika gagal autentikasi, arahkan kembali ke login dengan pesan kesalahan
                return redirect()->route('login')->withErrors([
                    'login' => 'Email atau password yang Anda masukkan salah. Silakan coba lagi.',
                ]);
            }
            }
        );


        $this->app->instance(
            LogoutResponse::class,
            new class implements LogoutResponse {
            public function toResponse($request)
            {
                notify()->success('Logout berhasil!', 'Sampai jumpa!');
                return redirect()->route('index');
            }
            }
        );

        $this->app->instance(
            RegisterResponse::class,
            new class implements RegisterResponse {
            public function toResponse($request)
            {
                notify()->success('Registrasi berhasil!', 'Silakan login.');
                return redirect()->route('login');
            }
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //register
        Fortify::registerView(function () {
            return view('auth.register');
        });

        //login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        //forgot
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        //reset
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        Fortify::authenticateUsing(function ($request) {
            // Cek apakah input berupa email atau bukan
            $input = $request->input('login');
            $isEmail = filter_var($input, FILTER_VALIDATE_EMAIL);

            // Jika input adalah email, cari berdasarkan email, jika tidak cari berdasarkan nama
            if ($isEmail) {
                $user = User::where('email', $input)->first();
            } else {
                $user = User::where('name', $input)->first();
            }

            // Jika pengguna ditemukan dan password cocok, kembalikan pengguna
            if ($user && Hash::check($request->input('password'), $user->password)) {
                return $user;
            }

            // Menampilkan pesan yang berbeda berdasarkan jenis input
            $message = $isEmail ? 'Email atau password yang Anda masukkan salah. Silakan coba lagi.' : 'Name atau password yang Anda masukkan salah. Silakan coba lagi.';

            throw ValidationException::withMessages([
                'login' => [$message],
            ]);
        });



        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
