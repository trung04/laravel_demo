<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    @auth
        <p class="text-xs font-bold uppercase">Welcome,{{ auth()->user()->name }}</p>
        <form action="/logout" method="post" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-dark">Logout</button>

        </form>
    @endauth
    <a href="{{ Route('user.create') }}" class="btn btn-info">Add</a>
    <form method="get">
        <input type="text" placeholder="Tìm kiếm" name="search">
        <button type="submit">Find</button>
    </form>
    <form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ Route('user.destroy', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                <a class="btn btn-danger" href={{ route('user.edit', $user->id) }}>Edit</a>
                                @csrf
                                @method('delete')
                                <button type="submit"class="btn btn-dark">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </form>
    {{ $users->links() }}

    <x-flash />
    <x-comment/>
    <x-comment/>
    <x-comment/>


</body>

</html>
