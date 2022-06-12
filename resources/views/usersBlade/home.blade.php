@include('welcome')

@section('main')
<div class="container" style="margin: 7%">
    <div class="row" >
      <div class="col" style="margin-top: 5%;margin-left: 40$">
        <h1 class="text-white" style="font-family:cursive",>Your phone is stolen?</h1>
        <div class="text-white">What bad luck, we are sorry for what happened, you can save data about your phone if someone finds it, a user will contact you or the thief will not benefit from anything</div>
        
        <a class="float-end" href="{{url('search')}}" style="text-decoration: none;color: inherit;"><button class="button" style="vertical-align:middle"><span>Search</span></button></a> 
      </div>
      <div class="col">
        <img src="{{asset('asset/define/bg.svg')}}" alt="" height="80%" width="45%" style="margin-left: 50%">
      </div>
        
    </div>
  