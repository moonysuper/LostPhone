@extends('admin.main')
@section('title','Report')
@section('containt')
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    
    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }
    
    #myImg:hover {opacity: 0.7;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }
    
    /* Modal Content (image) */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }
    
    /* Caption of Modal Image */
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }
    
    /* Add Animation */
    .modal-content, #caption {  
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }
    
    @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)} 
      to {-webkit-transform:scale(1)}
    }
    
    @keyframes zoom {
      from {transform:scale(0)} 
      to {transform:scale(1)}
    }
    
    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }
    
    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
    
    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
      .modal-content {
        width: 100%;
      }
    }
    </style>
<div class="card">
    <div class="card-header">
        <h4>Report View</h4>
    </div>
    <div class="card-body">
        @if(session('status'))
            <script>
                swal("Good job!", "{{ session('status') }}", "success");
            </script>
        @endif
        <table class="col-12  table table-hover">
            <thead style="text-align:center;">
            <tr>
                <th>ID</th>
                <th>ownername</th>
                <th>phone</th>
                <th>Iemi</th>
                <th>brand</th>
                <th>model</th>
                <th>ptheft</th>
                <th>Status</th>
                <th>date</th>
                <th>report</th>
                <th>box</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody >
            @foreach($report as $item )
                <tr>
                    <td>{{$item->ID}}</td>
                    <td>{{$item->ownername}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->Imei}}</td>
                    <td>{{$item->brand}}</td>
                    <td>{{$item->model}}</td>
                    <td>{{$item->ptheft}}</td>
                    <td>{{$item->confirm == 1 ?  'Confirmed' :  'Waiting for confirm'}}</td>
                    <td>{{$item->date}}</td>
                    <td>    
                        <img id="myImg" style="margin:10px" src="{{ asset('asset/uploads/'.$item->rep_image)}}" alt="Image" width="100" height="100">
                            <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                              </div>
                    </td>
                    <td>
                        <img id="myImg" style="margin:10px" src="{{ asset('asset/uploads/box/'.$item->box_image)}}" alt="Image here" width="100" height="100">
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                    </td>
                    <td>
                        <form action="{{url('update_report/'.$item->ID)}}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                            <button type="submit" class="btn btn-warning btn-sm">ConFirm</button>
                        </form>

                        <form action="{{url('delete_report/'.$item->ID)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                         </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            }
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
              modal.style.display = "none";
            }
            </script>
    </div>
</div>
@endsection