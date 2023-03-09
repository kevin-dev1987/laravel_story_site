@include('includes.head')
@include('includes.header')
@include('includes.navigation')
    <div class="container">
        <main>
            @include('includes.site-notif-bar')
            @yield('content')
        </main>
    </div>
@include('includes.footer')