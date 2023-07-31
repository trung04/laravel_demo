<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
    <form method="post" action="{{ Route('user.update', $user->id) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="email" value="{{ $user->email }}"class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('email')
                <p @style('color:red')>{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" value="{{ $user->password }}"class="form-control"
                id="exampleInputPassword1">
            @error('password')
                <p @style('color:red')> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name </label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
            @error('name')
                <p @style('color:red')>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

</body>

</html>
