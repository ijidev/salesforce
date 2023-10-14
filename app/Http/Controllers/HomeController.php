<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Faq;
use App\Models\Tier;
use App\Models\Deposit;
use App\Models\Setting;
use App\Models\Withdrawal;
use App\Models\PaymentInfo;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\UserPayment;
use App\Models\Notification;
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

            $notify = Notification::where('user_id', Auth::user()->id)
            ->where('is_read', false)->get();
            $d = Deposit::where('user_id',Auth::user()->id)->get()->first();
            $user = Auth::user();
            $faqs = Faq::get();
            $set = Setting::get()->first();
            if ($user->tier_id == null) {
                $tiers = Tier::all();

                return view('tiers', compact('tiers','user'));
            } else {
                $tiers = Tier::get()->take(4);
                $tier = $user->tier->get()->first();
                // dd($tiers);
                return view('home', compact('user', 'tier', 'tiers','faqs', 'set', 'notify'));
            }
        }
        
    }

    public function checkin()
    {
        return view('checkin');
    }

    public function getstarted()
    {
        $notify = Notification::where('user_id', Auth::user()->id)
            ->where('is_read', false)->get();
        $user = Auth::user();
        return view('start', compact('user','notify'));
    }

    public function start()
    {
        $user = Auth::user();
        $parent = $user->parent;
        $set = Setting::get()->first();
        $close_time = \Carbon\Carbon::parse($set->close_hour);
        $open_time = \Carbon\Carbon::parse($set->active_hour);
        $current_time = date('H');
        $review = ProductReview::where('user_id',$user->id)
            ->where('status', '!=' , 'approved' )->get();
            // dd($review);
        
        
        // $ref_amt = $user->tier->percent / 100 * $set->ref_amount;
        // dd( $ref_amt);

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

            if ($user->optimized >= $user->tier->daily_optimize) {

                // $percent = ($user->tier->price / 100) * $user->tier->percent;

                // $user->optimized += 1;
                // $user->balance += $percent;
                // $user->asset += $percent;
                // $user->update();

                // $ref_amt = ($user->tier->percent / 100 ) * $set->ref_amount;
                // $parent->balance += $set->ref_amt;
                // $parent->asset += $ref_amt;
                // $parent->update();
                return back()->with('error', 'Optimiz daily limit reached contact Support to reset');

                
            } elseif (Auth::user()->is_active == false ) {
                return back()->with('error', 'Account is in-Active please contact Support to Activate');
                
            }
             elseif ( $review->count() >= 1) {
                return redirect()->route('record')->with('error', 'you have one or more products pending completion please contact support');
                
            }
            else {
                $product = Product::get()->random();
                // dd($product);
                
                return view('review',compact('product'));
                # code...
            }
        }
        
        
        // dd($user);

    }

    public function term()
    {
        return view('terms');
    }

    public function withdrawPas()
    {
        return view('withdraw-pass');
    }

    // public function passCheck(Request $request)
    // {
    //     if ($request->pass == Auth::user()->withdrawal_pass ) {
    //         return
    //     }
    // }

    public function review(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        $review = new ProductReview();
        // dd($request->all());
        if ($product->price > $user->asset) {

            $review->product_id = $product->id;
            $review->user_id = $user->id;
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            $review->status = 'frozen';
    
            // dd($review);
            $review->save();

            $user->frozen += $user->asset;
            $user->asset -= $user->asset;
            $user->update();

            return redirect()->route('getstarted')->with('error','Insuficient balance, Please top up your account to continue review or contact support');

        } else {
    
            $review->product_id = $product->id;
            $review->user_id = $user->id;
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            $review->status = 'approved';
    
            // dd($review);
            $review->save();

            $user->balance += $product->profit ;
            $user->asset += $product->profit ;
            $user->optimized += 1 ;
            
            $user->update();

            return redirect()->route('getstarted')->with('success', 'Product review submited successfuly ');

        }
        
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

        $notif = new Notification();
            $notif->title = 'Deposit Pending review';
            $notif->massage = 'Deposit successful pending admin review';
            $notif->user_id = $user->id;
        $notif->save();


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

    public function record()
    {
        $user = Auth::user();
        $records = ProductReview::where('user_id', $user->id)->latest()->paginate(20);

        return view('record', compact('records', 'user'));
    }
    public function pendingRecord()
    {
        $user = Auth::user();
        $records = ProductReview::where('user_id', $user->id)
            ->where('status', 'pending')->latest()->paginate(20);

        return view('record', compact('records', 'user'));
    }
    public function frozenRecord()
    {
        $user = Auth::user();
        $records = ProductReview::where('user_id', $user->id)            
            ->where('status', 'frozen')->latest()->paginate(20);


        return view('record', compact('records', 'user'));
    }
    public function completedRecord()
    {
        $user = Auth::user();
        $records = ProductReview::where('user_id', $user->id)
            ->where('status', 'approved')->latest()->paginate(20);


        return view('record', compact('records', 'user'));
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
       
        $notif = new Notification();
            $notif->title = 'Account Update';
            $notif->massage = 'Your Account info successfuly updated';
            $notif->user_id = $user->id;
        $notif->save();

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

    public function withdraw(Request $request)
    {
        
        if ($request->pass == Auth::user()->withdrawal_pass ) {
            $user = Auth::user();
            $wallets = UserPayment::get();
            // dd($wallets);
            $withdraw = Withdrawal::where('user_id', $user->id)->latest()->get();
            return view('withdraw', compact('user','withdraw','wallets'));
        
        }else{
            return back()->with('error', 'incorrect password, please enter a valid password or contact support to reset password');
        }
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

            $notif = new Notification();
            $notif->title = 'Withdrawal Request';
            $notif->massage = 'Withdrawal Request submitted successfuly';
            $notif->user_id = $user->id;
            $notif->save();

            return back()->with('success','withdrawal request of $'. $amount .' submited successfuly ');
        }
    }

    public function contact()
    {
        return view('contact');
    }

    public function notify()
    {
        $notification = Notification::where('user_id', Auth::user()->id)->get(); 
        // dd($notification);
        $notifies = Notification::where('user_id', Auth::user()->id)
            ->where('is_read', false)->get();

            foreach ($notifies as $notify) {
                $notify->is_read = true;
                $notify->update();
            }
        return view('notify', compact('notification'));
    }
}
