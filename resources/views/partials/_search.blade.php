<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('dashboard') }}" method="GET" class="d-flex">
                    <input class="form-control" type="text" placeholder="hobby" name="search" aria-label="Search">
                    <button type="submit" class="btn btn-danger">Search</button>
                    {{-- <input type="submit" class="btn btn-custom-red me-3" name="search" value="Search"> --}}
                </form>
            </div>
        </div>
    </div>
</section>
