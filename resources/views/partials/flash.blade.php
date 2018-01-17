
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
    </div>
</div>
