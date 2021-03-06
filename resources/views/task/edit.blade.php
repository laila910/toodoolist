<!DOCTYPE html>
<html lang="en">

<head>
    <title>edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif







    <div class="container">
        <h2>Vertical (basic) form</h2>
        <form action="{{ url('/product/' . $data['id']) }}" method="post" enctype="multipart/form-data">





            <input type="hidden" name="_method" value="put">


            @csrf


            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{ $data['name'] }}" class="form-control" id="exampleInputName"
                    aria-describedby="" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" value="{{ $data['title'] }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="desc" value="{{ $data['desc'] }}" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
