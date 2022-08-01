<body>
    <div class="container">
        @yield('content')

        @stack('scripts')
        @yield('footer')
    </div>
</body>