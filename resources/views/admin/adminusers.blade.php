@extends('admin.main')
@section('title','Users')
@section('containt')

<div class="card">
    <div class="card-header">
        <h4>Users View</h4>
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
                <th>Name</th>
                <th>Email</th>
                <th>phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody >
            @foreach($user as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->mobile}}</td>
                    <td>
                        <a href="{{url('/update_user/'.$item->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                        <a href="{{url('/delete_user/'.$item->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

    
@endsection