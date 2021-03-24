@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div class="text-danger">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
