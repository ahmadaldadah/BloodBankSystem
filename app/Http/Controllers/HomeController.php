<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function bloodDonation(Request $request){
        $donor = Donor::where('user_id','=',$request->user()->id)->first();
//        dd($donor);
        $donations = BloodDonation::where('donorID','=',$donor->donorID)->get();
        return collect([
            'data' => $donations,
        ]);
    }
    public function loginApi(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'phone or password is incorrect'], 401);
        }
        $user = $request->user();
        $donor = Donor::where('user_id','=',$user->id)->first();
        $tokenResult = $user->createToken('authToken')->accessToken;
//        $tokenResult = 'iiiiiiiiiiiiiiiii';

        return collect([
            'data' => ['user'=>$user,
                'donor'=>$donor],
            'access_token' => $tokenResult,
        ]);
    }
}
