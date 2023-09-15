@extends('layouts.front-header')

@section('content')

<div class="welcome">
    <h3>Welcome Back</h3>
    <p>{{ $user->name }}</p>
</div>

<div class="icon-list">
    
    <div class="icon-card">
        
        <a href="#" id="certModalBtn">
            <div class="icon">
                <img src="{{ asset('frontassets/images/cart.png') }}" width="25" height="25" alt="">
            </div>
            <br>Cert
        </a>

    </div>
    
    <div class="icon-card">
        
        <a href="{{ route('withdraw') }}">
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


</div>

<div class="tiers">
<div class="tiers-heading">
    <h4>Tiers</h4>
    <a href="{{ route('membership') }}">View More</a>
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
    {{ $tier->description }}
    {{-- <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. </li>
    <li>Voluptate quis dicta magni earum maxime error tenetur! Dolorem nobis ratione optio.</li>
    <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, velit.</li> --}}
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
        <p>{{ $set->term }}</p>
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
        <p>{{ $set->about }}</p>
    </div>
</div>
