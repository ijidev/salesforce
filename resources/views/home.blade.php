@extends('layouts.front-header')

@section('content')

<div class="welcome justify-content-middle">
    <h3>Welcome Back</h3>
    <p>{{ $user->name }} <img src="{{asset($user->tier->icon)}}" width="30" alt="tier icon"> </p>
</div>

<div class="icon-list">
    
    <div class="icon-card">
        
        <a href="{{ route('checkin') }}">
            <div class="icon">
                <img src="{{ asset('frontassets/images/check-in.png') }}" width="25" height="25" alt="">
            </div>
            <br>Check-in
        </a>

    </div>
    
    
    <div class="icon-card">
        
        <a href="#" id="certModalBtn">
            <div class="icon">
                <img src="{{ asset('frontassets/images/cart.png') }}" width="25" height="25" alt="">
            </div>
            <br>Cert
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="{{ route('withdraw.pas') }}">
            <div class="icon">
                <img src="{{ asset('frontassets/images/withdrawal.png') }}" width="25" height="25" alt="">
            </div>
            <p>Withdrawal</p>
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="{{ route('membership') }}">
            <div class="icon">
                <img src="{{ asset('frontassets/images/Tiers.png') }}" width="25" height="25" alt="">
            </div>
            <p>Tiers</p>
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="#" id="openModalBtn">
            <div class="icon">
                <img src="{{ asset('frontassets/images/terms.png') }}" width="25" height="25" alt="">
            </div>
            <p>Terms</p>
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="#" id="eventModalBtn">
            <div class="icon">
                <img src="{{ asset('frontassets/images/event.png') }}" width="25" height="25" alt="">
            </div>
            <p>Event</p>
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="#" id="faqModalBtn">
            <div class="icon">
                <img src="{{ asset('frontassets/images/FAQ.png') }}" width="25" height="25" alt="">
            </div>
            <p>FAQ</p>
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="#" id="aboutModalBtn">
            <div class="icon">
                <img src="{{ asset('frontassets/images/about.png') }}" width="25" height="25" alt="">
            </div>
            <p>About</p>
        </a>

    </div>


    {{-- <div id="calendar"></div> --}}
</div>


{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('#calendar').fullCalendar({

        })
    });
</script> --}}

<div class="tiers">
<div class="tiers-heading">
    <h4>Tiers</h4>
    <a href="{{ route('membership') }}">View All <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
</div>
<div class="medal-container">
    @foreach ($tiers as $item)
        <div class="medal">
        <img src="{{ asset($item->icon) }}" alt="tire">
        </div>
    @endforeach
</div>
<hr>
<ul>
    {{-- {{ $tier->description }} --}}
    @if (Auth::user()->tier->name == 'Normal')
        {{ $user->tier->name }} users are assigned general usage access to data collection
        <li>Applicable to most data collection situations of light to medium level of usage involving the Products </li>
        <li>Profits of {{ $user->tier->percent }}% per Product - {{ $user->tier->daily_optimize }} products per set.</li>
        <li>No access to other premium features</li>
    @else (Auth::user()->tier->name == 'silver')
        {{ $user->tier->name }} users are assigned general usage access to data collection
        <li>Applicable to most data collection situations of light to medium level of usage involving the Products </li>
        <li>Profits of {{ $user->tier->percent }}% per Product - {{ $user->tier->daily_optimize }} products per set.</li>
        <li>Access to other premium features</li>
    @endif
        
</ul>
</div>

@endsection

<div id="certModal" class="modal">
    <div class="modal-content">
        <span class="close" id="certCloseBtn">&times;</span>
        <h2>Certificate</h2>
        <img src="{{ asset('frontassets/images/cert.png') }}" width="auto" alt="certificate">
    </div>
</div>

{{-- terms model--}}
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Terms</h2>
        @if ($set != null)
            <p>{!! $set->term !!}</p>
        @endif
    </div>
</div>

{{-- fad model --}}
<div id="faqModal" class="modal">
    <div class="modal-content">
        <span class="close" id="faqCloseBtn">&times;</span>
        <h2>FAQ</h2>
        @foreach ($faqs as $faq)
            <div class="faq-card">
                <div class="faq-question">
                    <h5>{{ $faq->question }}</h5>
                </div>
                <div class="faq-answer">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div id="aboutModal" class="modal">
    <div class="modal-content">
        <span class="close" id="aboutCloseBtn">&times;</span>
        <h2>About Us</h2>
        <hr>
        @if ($set != null)
            <p>{!! $set->about !!}</p>
        @endif

    </div>
</div>

<div id="eventModal" class="modal">
    <div class="modal-content text-left">
        <span class="close" id="eventCloseBtn">&times;</span>
        <h2>Event</h2>
        <hr>
        <uni-rich-text data-v-60bc8dea="" style="color: rgb(255, 255, 255);"><div style="position: relative;"><p data-v-a75f7a08=""><img data-v-a75f7a08="" alt="" src="{{asset('frontassets/images/membership.jpg')}}" style="max-width:100%;border:0"></p>

            <p data-v-a75f7a08=""><span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;"><strong data-v-a75f7a08="">Upgrade VIP join as SalesForce VIP members</strong></span></span></p>
            
            <p data-v-a75f7a08=""><span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;"><strong data-v-a75f7a08="">• Normal membership Price is USD($)99 The daily limit is 35 Products the profit rate for each Product is 0.5%<br data-v-a75f7a08="">
            • Silver membership Price is USD($)399 The daily limit is 40 Products the profit rate for each Products is 0.75%<br data-v-a75f7a08="">
            • Gold membership Price is USD($)999 The daily limit is 45 Products the profit rate for each Products is 1%<br data-v-a75f7a08="">
            • Platinum membership price is USD($)4999 The daily limit is 50 Products the profit rate for each Products is 1.25%<br data-v-a75f7a08="">
            • Diamond membership price is USD($)9999 The daily limit is 55 Products the profit rate for each Products is 1.5%</strong></span></span></p>
            
            <p data-v-a75f7a08=""><span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;"><strong data-v-a75f7a08="">Benefits:<br data-v-a75f7a08="">
            • Profit rates for different VIP levels<br data-v-a75f7a08="">
            • Can be reset 3 times daily<br data-v-a75f7a08="">
            • All capital and profit amounts can be withdrawn</strong></span></span></p>
            
            <p data-v-a75f7a08=""><br data-v-a75f7a08="">
            <span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;"><strong data-v-a75f7a08="">Terms &amp; Conditions<br data-v-a75f7a08="">
            • This offer is open to all SalesforceReviews members<br data-v-a75f7a08="">
            • VIP SalesforceReviews membership is NON-transferable.<br data-v-a75f7a08="">
            • Agents recharge the following VIP amount for start-up capital can upgrade to enjoy VIP level benefits and the money can be withdraw-able after completing the APPs<br data-v-a75f7a08="">
            • Agent VIP membership &amp; privilege is lifetime<br data-v-a75f7a08="">
            • The agent will start enjoying VIP privileges as each VIP level<br data-v-a75f7a08="">
            • The profit rate will increase with your VIP privilege level. (As shown above)<br data-v-a75f7a08="">
            Note: If any member violates conditions, SalesforceReviews always reserves the right to terminate the member's VIP status without any prior notice.<br data-v-a75f7a08="">
            General terms and conditions apply.<br data-v-a75f7a08="">
            <br data-v-a75f7a08="">
            <br data-v-a75f7a08="">
            <img data-v-a75f7a08="" alt="" src="{{ asset('frontassets/images/deposit.jpg') }}" style="max-width:100%;border:0"></strong></span></span></p>
            
            <p data-v-a75f7a08=""><br data-v-a75f7a08="">
            <strong data-v-a75f7a08=""><span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;">As a user of the platform, users may invite others to join your team by using the User ID after becoming a Diamond Membership. In return, the referrer will receive a percentage of referral fees, which will be credited directly to users via the platform account or team report.</span></span></strong></p>
            
            <p data-v-a75f7a08=""><br data-v-a75f7a08="">
            <span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;"><strong data-v-a75f7a08="">Notice!<br data-v-a75f7a08="">
            All users and their referrals will receive a percentage of referral incentives and bonuses</strong></span></span></p>
            
            <p data-v-a75f7a08=""><br data-v-a75f7a08="">
            <span data-v-a75f7a08="" style="font-family:Microsoft YaHei;"><span data-v-a75f7a08="" style="font-size:9px;"><strong data-v-a75f7a08="">User and Business Non-Disclosure Agreement<br data-v-a75f7a08="">
            The product to be completed on this platform is real-time data done by real users. Therefore, the users must ensure the Product's confidentiality and platform.</strong></span></span></p>
            <uni-resize-sensor><div><div></div></div><div><div></div></div></uni-resize-sensor></div></uni-rich-text>
    </div>
</div>

{{-- <div id="checkModal" class="modal">
    <div class="modal-content">
        <span class="close" id="checkCloseBtn">&times;</span>
        <h2>Check-in</h2>
        <hr>
        <div id="calendar"></div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#calendar').fullCalendar({
        
                })
            });
        </script>
    </div>
</div> --}}
