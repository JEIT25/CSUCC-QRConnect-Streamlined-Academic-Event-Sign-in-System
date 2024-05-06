<link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
<nav class="bg-darkblue navbar-expand-lg navbar">
    <div class="container-fluid">
        <button class="btn btn-outline-dark ms-2 mt-1" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="rgb(255, 187, 60)"
                    d="M12.78 18.78a.749.749 0 0 1-1.06 0l-6.25-6.25a.749.749 0 0 1 0-1.06l6.25-6.25a.749.749 0 1 1 1.06 1.06l-4.969 4.97H22.25a.75.75 0 0 1 0 1.5H7.811l4.969 4.97a.749.749 0 0 1 0 1.06ZM2.75 3.75a.75.75 0 0 1 .75.75v15a.75.75 0 0 1-1.5 0v-15a.75.75 0 0 1 .75-.75Z">
                </path>
            </svg>
        </button>
        <a class="text-warning fw-semibold navbar-brand ms-5" href="{{ route('events.index') }}">
            <img src="{{ asset('assets/images/qr-logo.png') }}" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-center">
            CSUCC QRConnect
        </a>
        <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarNav">
            <ul class="navbar-nav ms-auto me-5">
                <li class="nav-item me-5">
                    <a class="text-warning nav-link active" href="{{ route('events.index') }}">My Events</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="bg-darkblue offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header d-flex flex-column">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80" height="80">
            <path fill="white"
                d="M12 2.5a5.25 5.25 0 0 0-2.519 9.857 9.005 9.005 0 0 0-6.477 8.37.75.75 0 0 0 .727.773H20.27a.75.75 0 0 0 .727-.772 9.005 9.005 0 0 0-6.477-8.37A5.25 5.25 0 0 0 12 2.5Z">
            </path>
        </svg>
        @auth
            <h5 class="offcanvas-title text-capitalize text-white" id="staticBackdropLabel">Admin {{ auth()->user()->fname }}
                <h5 class="offcanvas-title text-white" id="staticBackdropLabel">{{ auth()->user()->email }}</h5>
            @else
                <p>Please log in to view this page.</p>
            @endauth
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="offcanvas-body">
            <div class="container mt-5 d-flex flex-column align-item-center justify-content-center">

                <a href="/admins" class="link-underline link-underline-opacity-0">
                    <button class="btn btn-primary my-3 text-white fw-semibold" style="min-width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path
                                d="M6.906.664a1.749 1.749 0 0 1 2.187 0l5.25 4.2c.415.332.657.835.657 1.367v7.019A1.75 1.75 0 0 1 13.25 15h-3.5a.75.75 0 0 1-.75-.75V9H7v5.25a.75.75 0 0 1-.75.75h-3.5A1.75 1.75 0 0 1 1 13.25V6.23c0-.531.242-1.034.657-1.366l5.25-4.2Zm1.25 1.171a.25.25 0 0 0-.312 0l-5.25 4.2a.25.25 0 0 0-.094.196v7.019c0 .138.112.25.25.25H5.5V8.25a.75.75 0 0 1 .75-.75h3.5a.75.75 0 0 1 .75.75v5.25h2.75a.25.25 0 0 0 .25-.25V6.23a.25.25 0 0 0-.094-.195Z">
                            </path>
                        </svg>
                        Home
                    </button>
                </a>

                <a href="{{ route('admins.show') }}" class="link-underline link-underline-opacity-0">
                    <button class="btn btn-warning my-3 text-white fw-semibold" style="min-width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path fill="#132533"
                                d="m8.533.133 5.25 1.68A1.75 1.75 0 0 1 15 3.48V7c0 1.566-.32 3.182-1.303 4.682-.983 1.498-2.585 2.813-5.032 3.855a1.697 1.697 0 0 1-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 0 1 1.217-1.667l5.25-1.68a1.748 1.748 0 0 1 1.066 0Zm-.61 1.429.001.001-5.25 1.68a.251.251 0 0 0-.174.237V7c0 1.36.275 2.666 1.057 3.859.784 1.194 2.121 2.342 4.366 3.298a.196.196 0 0 0 .154 0c2.245-.957 3.582-2.103 4.366-3.297C13.225 9.666 13.5 8.358 13.5 7V3.48a.25.25 0 0 0-.174-.238l-5.25-1.68a.25.25 0 0 0-.153 0ZM9.5 6.5c0 .536-.286 1.032-.75 1.3v2.45a.75.75 0 0 1-1.5 0V7.8A1.5 1.5 0 1 1 9.5 6.5Z">
                            </path>
                        </svg></i>
                        My Profile
                    </button>
                </a>

                <a href="/events" class="link-underline link-underline-opacity-0">
                    <button class="btn btn-success my-3 text-white fw-semibold" style="min-width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path
                                d="M8 1.5a6.5 6.5 0 1 0 6.016 4.035.75.75 0 0 1 1.388-.57 8 8 0 1 1-4.37-4.37.75.75 0 1 1-.569 1.389A6.473 6.473 0 0 0 8 1.5Zm6.28.22a.75.75 0 0 1 0 1.06l-4.063 4.064a2.5 2.5 0 1 1-1.06-1.06L13.22 1.72a.75.75 0 0 1 1.06 0ZM7 8a1 1 0 1 0 2 0 1 1 0 0 0-2 0Z">
                            </path>
                        </svg>
                        Dashboard
                    </button>
                </a>

                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger my-2" style="min-width: 100%">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                            <path fill="#132533"
                                d="M2 2.75C2 1.784 2.784 1 3.75 1h2.5a.75.75 0 0 1 0 1.5h-2.5a.25.25 0 0 0-.25.25v10.5c0 .138.112.25.25.25h2.5a.75.75 0 0 1 0 1.5h-2.5A1.75 1.75 0 0 1 2 13.25Zm10.44 4.5-1.97-1.97a.749.749 0 0 1 .326-1.275.749.749 0 0 1 .734.215l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.749.749 0 0 1-1.275-.326.749.749 0 0 1 .215-.734l1.97-1.97H6.75a.75.75 0 0 1 0-1.5Z">
                            </path>
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
