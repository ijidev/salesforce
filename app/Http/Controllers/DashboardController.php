<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Setting;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('admin.user',compact('user'));
    }

    public function fund($id, Request $request)
    {
        $user = User::find($id);
        if($request->select == 'credit')
        {
            // dd($request->all(), $user);
            $user->asset += $request->amount;
            $user->update();
            return back()->with('success', 'User Balance toped up with $'. $request->amount);
        }
        
        if($request->select == 'debit')
        {
            $user->asset -= $request->amount;
            $user->update();

            return back()->with('success', 'User Balance debited with $'. $request->amount);
        }

        if($request->select == 'freez')
        {
            if ($user->asset >= $request->amount) {
                $user->asset -= $request->amount;
                $user->frozen += $request->amount;
                $user->update();

                return back()->with('success', ' $'. $request->amount . ' freezed from user Balance Successfuly');
            } else {
                return back()->with('error', 'user balance lesser than $'. $request->amount . ' please enter an ammount not more than $'.$user->asset);
                
            }
            
        }
        if($request->select == 'unfreez')
        {
            if ($user->frozen >= $request->amount) {
                $user->frozen -= $request->amount;
                $user->asset += $request->amount;
                $user->update();

                return back()->with('success', ' $'. $request->amount . ' unfreezed to user Balance Successfuly');
            } else {
                return back()->with('error', 'user frozen balance lesser than $'. $request->amount . ' please enter an amount not more than $'.$user->frozen);
                
            }
            
        }
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->pass = $request->password;
            $user->password = Hash::make($request->password);
        }
        $user->is_active = $request->status;
        $user->update();
        return back();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function withdraw()
    {
        $withdraws = Withdrawal::latest()->get();
        return view('admin.withdrawal', compact('withdraws'));
    }

    public function approve($id)
    {
        $withd = Withdrawal::find($id);
        $withd->status = 'approved';
        $withd->update();
        return back();
    }
    
    public function decline($id)
    {
        $withd = Withdrawal::find($id);
        $withd->status = 'declined' ;
        $withd->update();
        return back();
    }

    public function deposit()
    {
        $deposits = Deposit::latest()->get();
        // dd($deposits);
        return view('admin.deposit', compact('deposits'));
    }

    public function approveDeposit($id)
    {
        $deposit = Deposit::find($id);
        $deposit->is_approved = true;
        $deposit->update();
        $deposit->user->is_active = true;
        $deposit->user->update();

        return back()->with('success', 'Deposit approved, user account set to active');
    }

    public function settings()
    {
        $setting = Setting::get();
        if ($setting->count() < 1) {
            $set = [];
        } else {
            $set = $setting->first();
        }
        // dd($set);
        return view('admin.settings', compact('set'));
    }

    public function updateSetting(Request $request)
    {
        $setting = Setting::get();

        if ($setting->count() < 1) {
            $set = new Setting();
            $set->active_hour = $request->open;
            $set->close_hour = $request->close;
            $set->min_withdrawal = $request->amount;
            $set->ref_amount = $request->ref;
            // dd($set);
            $set->save();
        } else {
            $set = $setting->first();
            $set->active_hour = $request->open;
            $set->close_hour = $request->close;
            $set->min_withdrawal = $request->amount;
            $set->ref_amount = $request->ref;
            // dd($set);
            $set->update();
        }
        
        return back()->with('success','settings updated successfuly');
    }



}