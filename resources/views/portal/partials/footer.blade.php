@section('footer')
    <div class="row navbar-dark">
        <div class="col-12">
            <h6 class="text-light"><i class="fas fa-fw fa-concierge-bell"></i> Services<strong> & </strong>Resources
            </h6>
        </div>
        <div class="col-2">
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('home')}}">
                <div><i class="text-white  fas fa-home"></i> PBS Homepage</div>
            </a>

            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('alerts')}}">
                <div><i class="text-white fas fa-user-clock"></i> Alerts</div>
            </a>
        </div>
        <div class="col-2">
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('generalcontracting')}}">
                <div><i class="text-white fas fa-signature"></i> General Contracting</div>
            </a>
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('network')}}">
                <div><i class="text-white fas fa-fw fa-globe"></i> Network</div>
            </a>
        </div>
        <div class="col-2">

            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('nycdobcode')}}">
                <div><i class="text-white fas fa-fw fa-book"></i> NYC DOB Code</div>
            </a>
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('nycfdnycode')}}">
                <div><i class="text-white fas fa-fw fa-book"></i> NYC FDNY Code</div>
            </a>
        </div>
        <div class="col-2">
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('nycdepcode')}}">
                <div><i class="text-white fas fa-fw fa-book-open"></i> DOB Service Updates</div>
            </a>

            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('violationcorrection')}}">
                <div><i class="text-white fas fa-fw fa-phone-square"></i> Violation Correction</div>
            </a>
        </div>
        <div class="col-2">
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('filingrepresentation')}}">
                <div><i class="text-white fas fa-fw fa-user-clock"></i> Filing Representation</div>
            </a>
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('contactus')}}">
                <div><i class="text-white fas fa-fw fa-phone-alt"></i> Contact Us</div>
            </a>
        </div>
        <div class="col-2">
            <a target="_blank" rel="noopener noreferrer" class="text-muted" href="{{route('home')}}">
                <div class="float-none text-center" style="font-size: x-large"><i
                            class="text-white-50 fas fa-copyright"></i> {{now()->year}}
                </div>
            </a>
        </div>
    </div>



@stop