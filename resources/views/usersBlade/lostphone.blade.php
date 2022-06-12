@extends('welcome')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white" style="margin-top:4%;box-shadow:10px 10px 25px 10px #6f949c;background-color: #20839a;width: 80%; opacity: 90%;margin-left: 10%">
                <div class="card-header">Report a lost phone</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{url('addlostphone')}}">
                        @csrf

                        <div class="row mb-3">
                            
                            <label for="name" class="col-md-4 col-form-label text-md-end">Owner Name *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Full Owner Name" name="ownername" required autocomplete="name" autofocus>
                                @error('ownername')
                                <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                    @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Your Phone number *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Your Phone numbers without 0" name="phone" required >
                                @error('phone')
                                <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                    @enderror
                            </div>
                                
                        </div>
                            <div class="row mb-3">
                                <label for="imei" class="col-md-4 col-form-label text-md-end">ImeI Number *</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" placeholder="phone IMEI" name="imei" required >
                                    @error('imei')
                                    <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                        @enderror
                                </div>
                                
                            
                            </div>
                                <div class="row mb-3">
                                    <label for="brand" class="col-md-4 col-form-label text-md-end">Brand *</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" placeholder="Apple - samsung OR Other" name="brand" required >
                                        @error('brand')
                                        <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                            @enderror
                                    </div>
                                    
                                </div>
                                    <div class="row mb-3">
                                        <label for="model" class="col-md-4 col-form-label text-md-end">Model *</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" placeholder="Iphone 8 - Iphone X Or something else " name="model" required >
                                            @error('model')
                                            <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                                @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <label for="report" class="col-md-4 col-form-label text-md-end">date of theft *</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="datetime-local" class="form-control" name="date" required >
                                            @error('date')
                                            <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                                @enderror
                                        </div>

                                    </div>
                                        <div class="row mb-3">
                                            <label for="ptheft" class="col-md-4 col-form-label text-md-end">place of theft *</label>
                
                                            <div class="col-md-6">
                                                <input id="" type="text" class="form-control" placeholder="place of theft" name="ptheft" required >
                                                @error('ptheft')
                                                <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                                    @enderror
                                            </div>
                                        </div>
                                     
                                    <div class="row mb-3">
                                        <label for="report" class="col-md-4 col-form-label text-md-end">police report Image *</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="file" class="form-control" name="report" required >
                                            @error('report')
                                            <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                                @enderror
                                        </div>
                                       
                                    </div>
                                    <div class="row mb-3">
                                        <label for="box" class="col-md-4 col-form-label text-md-end">Box Image</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="file" class="form-control" name="box"  >
                                            @error('box')
                                            <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                                @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" required>
                
                                                    <label class="form-check-label" for="remember">
                                                        I promise that the data entered is correct and the photos uploaded are clear and not falsified *
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row mb-3">
                                    <button class="btn btn-primary" type="submit">Report</button>
                                    </div>
                                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
