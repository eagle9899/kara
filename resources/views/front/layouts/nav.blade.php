<nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center">
        <div class="icon p-2 me-2">
            <img class="img-fluid" src="{{ asset('uploads/icon/'.$global_setting_data->logo) }}" alt="Icon"
                style="width: 30px; height: 30px;">
        </div>
        <h1 class="m-0 text-primary">Kara</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
            @foreach ($global_categories as $item)
            <a href="{{ route('category', $item->slugs.'/') }}" class="nav-item nav-link">{{ $item->name }}</a>
            @endforeach

            @if ($global_faq_about->about_top_status == "Show")

            <a href="{{ route('about') }}" class="nav-item nav-link">{{ $global_faq_about->about_title }}</a>
            @endif

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="property-list.html" class="dropdown-item">Property List</a>
                    <a href="" class="dropdown-item">Property Type</a>
                    <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                </div>
            </div>



            @if ($global_disclaimer_login_contact->contact_top_status == "Show")
            <a class="nav-item nav-link"
                href="{{ route('contact') }}">{{ $global_disclaimer_login_contact->contact_title }}</a>
            @endif
            @if ($global_disclaimer_login_contact->login_status == "Show")
            <a class="nav-item nav-link"
                href="{{ route('userlogin') }}">{{ $global_disclaimer_login_contact->login_title }}</a>
            @endif
            <div class="nav-item nav-link">

                <button class="btn btn-primary">Selling</button>
            </div>
        </div>
    </div>
</nav>