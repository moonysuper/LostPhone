@include('welcome')
@section('body')
{{-- <div class="container"> --}}
    <div class="row" style="width: 900px">
      <div class="col-5">
       <div class="container"style="">

            <div class="card text-white" style="margin-top:12%;box-shadow:10px 10px 25px 10px #6f949c;background-color: #20839a; opacity: 90%;padding-bottom:2%;margin-left: 10%">
                <div class="card-head p-2  text-white"><H3 style="text-align: center">Search Imei Now</H3></div>
                <div class="card-body" >
                    <form action="{{url('serach_phone')}}" class="form-imei" method="POST">
                        @csrf
                        <label for="">IMEI</label>
                        <input type="number" required class="form-control" name="imei" placeholder="TO get Imei In phone Press *#06#" >
                        @error('imei')
                                <span style="color: #A50808"><bold>{{ $message }}</bold></span>
                                    @enderror
                            
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 my-2">
                                <button class="button" style="vertical-align:middle"><span>Search </span></button>
            
                            </div>
                        </div>
                    </form>
                
            </div>
            </div>
            </div>
      </div>
      <div class="col-7">
        <div class="container"style="margin-top:10%">
            <table style="opacity: 80%;" class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>OwnerName</th>
                        <th>Imei</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>place of theft</th>
                        <th>Date of theft</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($phone))
                  
                    <tr>
                        <td>{{$phone->ownername}}</td>
                        <td>{{$phone->Imei}}</td>
                        <td>{{$phone->brand}}</td>
                        <td>{{$phone->model}}</td>
                        <td>{{$phone->ptheft}}</td>
                        <td>{{$phone->date}}</td>
                    </tr>
                  
                    @endif
                    
                </tbody>
              </table>
        </div>
      </div>
    {{-- </div> --}}

