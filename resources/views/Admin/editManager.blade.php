@extends('welcome')
@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Manager Data</h2>
            </div>
            @include('message')
            <div class="card-body">
                <form action="{{ route('update.Managers', $Managers->id) }}" method="post">
                    @csrf <!-- CSRF protection -->

                    <div class="mb-3">
                        <label for="ManagerName" class="form-label">Manager Name:</label>
                        <input type="text" class="form-control" value="{{ $Managers->ManagerName }}" id="ManagerName" name="ManagerName" required>
                    </div>

                    <div class="mb-3">
                        <label for="ManagerEmail" class="form-label">Manager Email:</label>
                        <input type="email" class="form-control" value="{{ $Managers->ManagerEmail }}" id="ManagerEmail" name="ManagerEmail" required>
                    </div>

                    <div class="mb-3">
                        <label for="ManagerMobile" class="form-label">Manager Mobile:</label>
                        <input type="text" class="form-control" value="{{ $Managers->ManagerMobile }}" id="ManagerMobile" name="ManagerMobile" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
            </div>
        </div>
    </div>

@endsection
