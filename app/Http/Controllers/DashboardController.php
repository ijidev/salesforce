<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Tier;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Setting;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get();
        $active = $user->where('is_active' , true)->count();
        $inactive = $user->where('is_active' , false)->count();
        $deposits = Deposit::where('is_approved',false)->get();
        return view('admin.dashboard', compact('user','active','inactive','deposits'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function user($id)
    {
        $tiers = Tier::all();
        $user = User::find($id);
        return view('admin.user',compact('user','tiers'));
    }

    public function fund($id, Request $request)
    {
        $user = User::find($id);
        if($request->select == 'credit')
        {
            // dd($request->all(), $user);
            $user->asset += $request->amount;
            $user->update();

            $notif = new Notification();
            $notif->title = 'Account Creadited';
            $notif->massage = 'Your Account has been creadited with $'.$request->amount;
            $notif->user_id = $user->id;
            $notif->save();

            return back()->with('success', 'User Balance toped up with $'. $request->amount);
        }
        
        if($request->select == 'debit')
        {
            $user->asset -= $request->amount;
            $user->update();

            $notif = new Notification();
            $notif->title = 'Account Debited';
            $notif->massage = 'Your Account has been Debit with $'.$request->amount;
            $notif->user_id = $user->id;
            $notif->save();

            return back()->with('success', 'User Balance debited with $'. $request->amount);
        }

        if($request->select == 'freez')
        {
            if ($user->asset >= $request->amount) {
                $user->asset -= $request->amount;
                $user->frozen += $request->amount;
                $user->update();

                $notif = new Notification();
                $notif->title = 'Asset Frozen';
                $notif->massage = '$'.$request->amount . ' of your asset frozen';
                $notif->user_id = $user->id;
                $notif->save();

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

                $notif = new Notification();
                $notif->title = 'Asset Unfreezed';
                $notif->massage = '$'.$request->amount . ' of frozen asset unfrozed and moved to your balance';
                $notif->user_id = $user->id;
                $notif->save();

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
        $user->tier_id = $request->tier;
        $user->credit_score = $request->score;
        $user->is_active = $request->status;
        $user->update();
        return back();
    }

    public function resetUser($id)
    {
        $user = User::find($id);

        $user->optimized = 0;

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

        $notif = new Notification();
        $notif->title = 'Withdrawal Request Approved';
        $notif->massage = 'Your Withdrawl Request has been appeoved successfuly fund will arive in your provided wallet address soon.';
        $notif->user_id = $withd->user->id;
        $notif->save();

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

    public function viewdeposit($id)
    {
        $item = Deposit::find($id);
        // dd($deposits);
        return view('admin.edit-deposit', compact('item'));
    }

    public function approveDeposit($id)
    {
        $deposit = Deposit::find($id);
        $deposit->is_approved = true;
        $deposit->update();
        $deposit->user->is_active = true;
        if ($deposit->user->credit_score == 0) {
            $deposit->user->credit_score = 100;
        }
        $deposit->user->ref_id = 'ref_'. 0 .$deposit->user->id;
        $deposit->user->update();

        $notif = new Notification();
        $notif->title = 'Deposit Request Approved';
        $notif->massage = 'Your deposit Request has been appeoved successfuly and your account is now active. Now you can start optimizing to make profit.';
        $notif->user_id = $deposit->user->id;
        $notif->save();

        return back()->with('success', 'Deposit approved, user account set to active');
    }

    public function settings()
    {
        $setting = Setting::get();
        // if ($setting->count() < 1) {
        //     $set = '';
        // } else {
            $set = $setting->first();
        // }
        // dd($set);
        return view('admin.settings', compact('set','setting'));
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
            $set->term = $request->terms;
            // dd($set);
            $set->update();
        }
        
        return back()->with('success','settings updated successfuly');
    }

    public function apps()
    {
        $apps = Product::all();
        return view('admin.apps',compact('apps'));
    }

    public function createApp()
    {
        return view('admin.create-app');
    }

    public function editApp($id)
    {
        $app = Product::findOrFail($id);
        return view('admin.edit-app',compact('app'));

    }

    public function deleteApp($id)
    {
        $app = Product::findOrFail($id);

        foreach ($app->review as $review) {
            $review->delete();
        }

        $app->delete();
        return back(); 
    }

    public function updateApp(Request $request, $id)
    {
        $app = Product::findOrFail($id);

        $app->name = $request->name;
        $app->price = $request->price;
        $app->profit = $request->profit;

        if ($request->has('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->name.'.'.$extention;
            $path = 'uploads/product/' ;
            $file->move($path, $filename);
    
            $app->img = $path . $filename;
        }

        // dd($app);

        $app->save();
        
        return redirect()->route('apps');
    }

    public function storeApp(Request $request)
    {
        $app = new Product();
        $app->name = $request->name;
        $app->price = $request->price;
        $app->profit = $request->profit;

        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = $request->name.'.'.$extention;
        $path = 'uploads/product/' ;
        $file->move($path, $filename);

        $app->img = $path . $filename;

        // dd($app);

        $app->save();
        
        return redirect()->route('apps');
    }

    public function plans()
    {
        $plans  = Tier::get();
        return view('admin.tier', compact('plans'));
    }

    public function addplan(Request $request)
    {
        $plan  = new Tier();
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->percent = $request->percent;
        $plan->daily_optimize = $request->optimize;

        $file = $request->file('icon');
        $extention = $file->getClientOriginalExtension();
        $filename = $request->name.'.'.$extention;
        $path = 'uploads/icon/' ;
        $file->move($path, $filename);

        $plan->icon = $path . $filename;
        // dd($plan);
        $plan->save();
        return back()->with('success','successfully created');
    }

    public function editplan( $id)
    {
        $plan  = Tier::find($id);

        return view('admin.editplan', compact('plan'));
    }

    public function updateplan(Request $request, $id)
    {
        $plan  = Tier::find($id);

        $plan->price = $request->price;
        $plan->percent = $request->percent;
        $plan->daily_optimize = $request->optimize;

        $plan->update();
        return back()->with('success','successfully created');
    }

    public function faq()
    {
        $faqs = Faq::get();
        return view('admin.faq' ,compact('faqs'));
    }

    public function editfaq($id)
    {
        $faq = Faq::find($id);
        return view('admin.editfaq' ,compact('faq'));
    }

    public function updatefaq(Request $request ,$id)
    {
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->ans;
        $faq->update();
        return redirect()->route('faq')->with('success', 'FAQ Updated successfuly');
    }

    public function deletefaq($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return back()->with('success','Faq Deleted');
    }

    public function addfaq(Request $request)
    {
        $faq = new faq();

        $faq->question = $request->question;
        $faq->answer = $request->ans;
        $faq->save();

        return back()->with('success', 'Faq Created Successfuly');
    }
}