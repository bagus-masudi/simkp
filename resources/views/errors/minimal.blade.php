<!DOCTYPE html>
<html class="no-js" lang="id">

<head>
    @include('user.partials.head')
</head>

<body>
    <div id="preloader">
        <div class="appmeet-load"></div>
    </div>

    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="error-content">
                        <h1>@yield('code')</h1>
                        <h2>@stack('title')</h2>
                        <p>@yield('message')</p>
                        <div class="button">
                            <a href="{{ url('/') }}" class="btn">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script>
      window.onload = function () {
        window.setTimeout(fadeout, 500);
      };

      function fadeout() {
        document.querySelector("#preloader").style.opacity = "0";
        document.querySelector("#preloader").style.display = "none";
      }
    </script>

</html>