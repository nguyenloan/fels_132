@if (session('errors'))
    <div class="flash alert-info">
        <p class="panel-body">
            {{ session('errors') }}
        </p>
    </div>
@endif
