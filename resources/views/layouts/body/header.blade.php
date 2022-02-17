<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{ url('/') }}"><span>Sakthi </span>UI</a></h1>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>

                <li><a href="{{ route('client.about') }}">About</a></li>

                <li><a href="{{ route('client.services') }}">Services</a></li>

                <li><a href="{{ route('client.portfolio') }}">Portfolio</a></li>

                <li><a href="{{ route('contact.client') }}">Contact</a></li>

            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->
