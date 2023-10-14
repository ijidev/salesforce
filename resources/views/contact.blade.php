@extends('layouts.front')

@section('content')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/6524009b6fcfe87d54b8040f/1hcaa4orh';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->

<div class="text-center">
  <img src="{{ asset('frontassets/images/logo-salesforce.svg') }}" alt="">
</div>

   <div class="card">
    <div class="card-body text-center text-white">
      <h5 class="card-title">Support</h5>
      <p class="card-text">For inquiries, complaint or support mail us on:</p>
      {{-- <br> --}}
      <strong>Support@salesforcereviews.info</strong>
    </div>
   </div>
@endsection