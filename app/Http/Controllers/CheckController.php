<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendMessages;
use App\Models\Check;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckController extends Controller
{
    public function index()
    {
        $rand = rand(100000, 999999);
        Check::create([
            'user_id' => auth()->user()->id,
            'value' => $rand,
        ]);
        Mail::to(auth()->user()->email)->send(new SendMessages($rand));
        return redirect()->back();
    }
    public function verify()
    {
        return view('check');
    }
    public function check(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'value' => 'required|min:6,max:6'
        ]);
        $data = Check::all();
        $len = count($data) - 1;
        if ($data[$len]->value == $request->value && $data[$len]->user_id == $request->user_id) {
            $user = User::findOrFail($data[$len]->user_id);
            if ($user) {
                $user->update([
                    'email_verified_at' => date('Y-m-d H:i:s')
                ]);
                return redirect(route('dashboard'));
            }else {
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
