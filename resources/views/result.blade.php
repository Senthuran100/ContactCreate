<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function alertfunction() {
           confirm("Are you sure you want to delete this?");
        
        }
    </script>
</head>

<body>

    <div class="container">
        <h2>Contact Details</h2>

        <div class="col-lg-6">
            <div class="form-group">

                <input type="text" class="form-control" id="search" name="search" placeholder="Search for the Contact"></input>

            </div>
        </div>
        <div class="col-lg-6">
            <form action="{{url('alphabet')}}" method="post">
                {{csrf_field()}}
                <input type="text" class="form-control" id="alphabet" name="alphabet" maxlength="1" placeholder="Enter the alphabet to get the Contact details">
                <button type="submit" class="btn btn-primary" align="center">Submit</button>
            </form>
        </div>
        <br>
        <br>
        <a href='/insert'><span class="glyphicon glyphicon-plus"></a> @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <br>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name </th>
                    <th>Phonenumber</th>
                    <th>Mobile</th>
                    <th>ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phonenumber }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->id }}</td>

                    <td>

                        <a data-toggle="tooltip" id="update" data-placement="top" title="Edit" href='update/{{ $user->id }}' data-rel="popup" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span></a>

                        <a data-toggle="tooltip" id="deldeete" data-placement="top" href='delete/{{ $user->id }}' title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm(" Are you sure you want to delete this? ");"><span class="glyphicon glyphicon-remove" ></span></a>

                    </td>
                </tr>
                @endforeach
            </tbody>
            <script src="{{asset('js/ajaxscript.js')}}"></script>
            <script type="text/javascript">
                $('#search').on('keyup',function(){
                $value=$(this).val(); 
                $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                $('tbody').html(data);
                }
                });
                })
            </script>
        </table>
        <p>Total Number of Contact -{{$users->total()}}</p>
        {{$users->links()}}
    </div>
</body>

</html>