<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    private $view = 'authentication.pages.';

    /**
     * Display member registration interface
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function showRegisterForm()
    {
        return view($this->view . 'register');
    }

    /**
     * Member registration process
     * @param RegisterRequest $request
     * @return mixed
     * @throws \Throwable
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        try {
            $data                      = $request->except('_token', '_method', 'password_confirmation', 'accept_condition', 'captcha');
            $data['password']          = bcrypt($request->password);
            $data['level']             = 2;
            $data['token']             = Str::random(40);
            $data['email_verified_at'] = Carbon::now()->addMinutes(15);
            $data['status']            = 'off';

            $user = User::create($data);

            $user->sendVerificationEmail();

            DB::commit();

            return response()->json([
                'status'   => 'success',
                'message'  => message('register.sent'),
                'redirect' => route('auth.showRegisterForm')
            ], 200);
        } catch (\Error $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
