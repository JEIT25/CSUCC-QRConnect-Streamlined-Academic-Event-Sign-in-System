<link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
    <nav class="bg-darkblue navbar-expand-lg navbar">
        <div class="container-fluid">
            <a class="text-warning fw-bold navbar-brand ms-5" href="/">
                <img src="{{ asset('assets/images/qr-logo.png') }}" alt="Logo" width="30"
                    height="24"class="d-inline-block align-text-center">
                CSUCC QRConnect
            </a>
            <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-5" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item me-5">
                        <a class="text-warning nav-link active" aria-current="page"
                            href="{{ route('attendees.create') }}">Generate QR Code</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="text-warning nav-link" href="{{ route('attendees.events.list') }}">Events</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="text-warning nav-link" href="{{ route('login') }}">Log in as admin</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>