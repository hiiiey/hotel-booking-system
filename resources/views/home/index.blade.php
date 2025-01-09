<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Include jQuery before using it in your script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>

    <!-- banner -->
    @include('home.slider')

    <!-- about -->
    @include('home.about')

    <!-- our_room -->
    @include('home.room')

    <!-- gallery -->
    @include('home.galary')

    <!-- blog -->
    @include('home.blog')

    <!-- contact -->
    @include('home.contact')

    <!-- footer -->
    @include('home.footer')

    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                sessionStorage.setItem('scrollTop', $(this).scrollTop());
            });
        });

        window.addEventListener('beforeunload', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        });

        window.addEventListener('load', function() {
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, scrollPosition);
                localStorage.removeItem('scrollPosition');
            }
        });
    </script>
</body>

</html>