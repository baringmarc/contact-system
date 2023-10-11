@extends('layout') 
@section('content')
<div class="col-md-12">

    <div class="row">
        <h2>Contacts</h2>
    </div>

    {{-- <div class="row pb-3">
        <div class="col-12 d-flex justify-content-end">
            <a class="p-2" href="/create">Add Contact</a>
            <a class="p-2" href="/">Contacts</a>
            <a class="p-2" href="/logout">Logout</a>
        </div>
    </div> --}}

    <div class="row pb-3">
        <div class="col-12 d-flex justify-content-end">
            <input class="p-2" type="text" placeholder="Search" id="search">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>NAME</th>
                <th>COMPANY</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                
                <th></th>
            </thead>

            <tbody id="contacts-table-body">
                @if($data) 
                @foreach($data as $row)
                <tr>

                    
                    <td>{{$row->name }}</td>
                    <td>{{$row->company}}</td>
                    <td>{{$row->phone }}</td>
                    <td>{{$row->email }}</td>
                    

                    <td>
                        <a href="{{$row->id}}/edit" class="btn btn-primary">Edit</a>

                        <form action="destroy/{{$row->id}}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
    </div>
    <div>
        <?php echo $data->render(); ?>
    </div>
</div>

@endsection