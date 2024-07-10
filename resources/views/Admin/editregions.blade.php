@extends('welcome')
@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Manager Data</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update.regions', $regions->id) }}" method="post">
                    @csrf <!-- CSRF protection -->

                    <div class="mb-3">
                        <label for="ManagerName" class="form-label">Regions Name:</label>
                        <input type="text" class="form-control" value="{{ $regions->regionname }}" id="ManagerName" name="regionname" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Update Data</button>
                </form>
            </div>
        </div>
    </div>

@endsection
