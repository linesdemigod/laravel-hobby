@props(['hob'])

<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><a href="{{ route('show', $hob->id) }}"
                    class="text-decoration-none text-primary">{{ $hob->user->name }}</a></h3>
            <small class="text-center card-subtitle">{{ $hob->created_at->diffForHumans() }}</small>
            <p class="card-text text-center">Age: <span class="text-muted">{{ $hob->age }}</span></p>
            <p class="card-text text-center">Hobby: <span class="text-muted">{{ $hob->hobby }}</span></p>
        </div>
    </div>
</div>
