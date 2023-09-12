<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Tier;
use App\Models\Deposit;
use App\Models\Setting;
use App\Models\Withdrawal;
use App\Models\PaymentInfo;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DashboardController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin');
            // return redirect()->action([DashboardController::class, 'index']);
        } 
        else{

            $d = Deposit::where('user_id',Auth::user()->id)->get()->first();
            $user = Auth::user();
            if ($user->tier_id == null) {
                $tiers = Tier::all();

                return view('tiers', compact('tiers','user'));
            } else {
                $tiers = Tier::get()->take(4);
                $tier = $user->tier->get()->first();
                // dd($tiers);
                return view('home', compact('user', 'tier', 'tiers','d'));
            }
        }
        
    }

    public function start()
    {
        $user = Auth::user();
        $set = Setting::get()->first();
        $close_time = \Carbon\Carbon::parse($set->close_hour);
        $open_time = \Carbon\Carbon::parse($set->active_hour);
        $current_time = date('H');
        // dd('opening time '.$open_time->format('H') , "current time " . date('H'), 'closing time ' . $close_time->format('H'));
         
        // dd($user->tier->daily_optimize);
        if ($current_time >= $close_time->format('H')) 
        {
            return back()->with('error','Active hour passed try again between '. $set->active_hour . ' & ' . $set->close_hour);
        } 

        elseif ($current_time < $open_time->format('H')) 
        {
            return back()->with('error','Active hour passed try again between '. $set->active_hour . ' & ' . $set->close_hour);
        }
        
        else{

            if ($user->optimized < $user->tier->daily_optimize) {
                $user->optimized += 1;
                $user->balance += $user->tier->percent;
                $user->asset += $user->tier->percent;
                $user->update();
                return back()->with('success', 'Optimized');
            } else {
                return back()->with('error', 'Optimiz daily limit reached contact Support to reset');
                # code...
            }
        }
        
        
        // dd($user);

    }

    public function deposit($id)
    {
        $payment = PaymentInfo::where('status','active')->get();
        $plan = Tier::findOrFail($id);
        // dd($plan);
        return view('deposit',compact('plan','payment'));
    }
    
    public function confirmDeposit(Request $request, $id)
    {
        $deposit_record = new Deposit();
        $plan = Tier::findOrFail($id);
        $user = Auth::user();

        $user->tier_id = $plan->id;
        $user->asset = $plan->price;
        $user->is_active = false ;
        // dd($user);
        $user->update();


        // $request -> validate([
        //     'proof' => 'image',
        // ]);

        $deposit_record->user_id = $user->id;
        $deposit_record->amount = $plan->price;

        //save proof of payment 
        $file = $request->file('proof_image');
        $extention = $file->getClientOriginalExtension();
        $filename = 'paymentproof'.$user->id.'.'.$extention;
        $file->move('uploads/proof/', $filename);
        
        $deposit_record->proof = $filename;
        $deposit_record->save();
        // dd($deposit_record);
        #code...

        return redirect()->action([HomeController::class, 'index']);
    }

    public function profile()
    {
        $tiers = Tier::get()->take(4);
        $user = Auth::user();
        $tier = $user->tier->get()->first();
        return view('profile', compact('user', 'tier', 'tiers'));
    }

    public function tier()
    {
        $tiers = Tier::all();
        $user = Auth::user();
        return view('tiers', compact('tiers','user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit',compact('user'));
    }

    public function update(Request $request) 
    {
        $user = Auth::user();

        // $request -> validate([
        //     'name' => 'string',
        //     // 'email' => 'email'|'unique:users,email,'. $user->id .',id',
        //     'password' => 'password',
        // ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != null) {
            $user->pass = $request->password;
            $user->password = Hash::make($request->password);
        }
        // dd($user);
        $user->update();
        return back();
    }

    public function info()
    {
        $infos = UserPayment::where('user_id', Auth::user()->id)->get();
        return view('paymentinfo', compact('infos'));
    }
    
    public function AddInfo(Request $request)
    {
        $info = new UserPayment();
        $info->wallet = $request->wallet;
        $info->address = $request->address;
        $info->user_id = Auth::user()->id;
        $info->save();
        return back();
    }


    public function EditInfo($id)
    {
        $info = UserPayment::find($id);
        return view('editpaymentinfo', compact('info'));
    }
    
    public function storeInfo(Request $request, $id)
    {
        $info = UserPayment::find($id);
        $info->wallet = $request->wallet;
        $info->address = $request->address;
        $info->update();
        return redirect()->action([HomeController::class, 'info']);
    
    }

    public function RemoveInfo($id)
    {
        $info = UserPayment::find($id);
        $info->delete();
        return redirect()->action([HomeController::class, 'info']);
    }

    public function withdraw()
    {
        $user = Auth::user();
        $wallets = UserPayment::get();
        // dd($wallets);
        $withdraw = Withdrawal::where('user_id', $user->id)->latest()->get();
        return view('withdraw', compact('user','withdraw','wallets'));
    }

    public function request(Request $request)
    {
        $user = Auth::user();
        $amount = $request->amount;
        $withdraw = new Withdrawal();

        if ($amount > $user->asset) {
            return back()->with('error','you can only withdraw amount bellow $'. $user->asset );
        }else{

            $user->asset -= $amount;
            $user->update();

            $withdraw->amount = $amount;
            $withdraw->user_id = $user->id;
            $withdraw->wallet_id = $request->wallet;
            $withdraw->save();

            return back()->with('success','withdrawal request of $'. $amount .' submited successfuly ');
        }
    }
}
