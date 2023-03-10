<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <div class="container mt-5">
            <div class="row justify-content-start">
            <h1 class="fw-bold">🏋️‍♀️Lara's Gym</h1>
            <p>A gym management with create, register, update and delete operations.</p>
            <hr>

            @if( session('success') )
            <div class="alert alert-primary">{{ session('success') }}</div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Membership Type</th>
                        <th>Membership Expiration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->membership_type }}</td>
                        <td>{{ $member->membership_expiration }}</td>
                        <td>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <a href="{{ route('deletemember', $member->id) }}" class="btn btn-sm btn-danger"> Delete </a>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#newMemberModal" class="btn btn-primary">+ New Member</button>
                <!-- -->
                <div class="modal fade" id="newMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" >Add New Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!--FORM-->
                        <form method="POST" action="{{ route('createmember') }}">
                            @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="membershiptype" class="form-label">Membership Type</label>
                            <input type="text" class="form-control" id="membershiptype" name="membershiptype" required>
                        </div>
                        <div class="mb-3">
                            <label for="membershipexpiration" class="form-label">Membership Expiration</label>
                            <input type="date" class="form-control" id="membershipexpiration" name="membershipexpiration" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div> 
            </div>      
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
