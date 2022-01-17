<nav class="navbar navbar-expand-lg navbar-light cta-bg-primary">
    <a class="text-white fw-bolder navbar-brand ms-3" href="#"> Medicareli</a>
    <button class="text-white navbar-toggler cta-bg-primary" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-light"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

        <div class="text-center navbar-nav">
            <li class="nav-item">
                <a class="text-white nav-link hvr-underline-from-center" href="{{ route("dashboard.show") }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link hvr-underline-from-center" href="#">Consult Doctor</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link hvr-underline-from-center" href="#">Buy Prescription</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link hvr-underline-from-center" href="#">Knowledge Bank</a>
            </li>
            <li class="nav-item">
                <a class="text-white btn btn-danger nav-link bg-danger hvr-underline-from-center border-success"
                href="{{ route("register") }}">Sign-Up</a>
            </li>
        </div>
    </div>
</nav>

