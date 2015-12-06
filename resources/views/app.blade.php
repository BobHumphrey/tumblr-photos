<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Tumblr Photos</title>
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">
  </head>
  <body>
    @include('partials.navbar')
    <section id="content">
      <div id="page-heading">
        <h2>@yield('pageTitle')</h2>
      </div>
      <div class="container">
        @include('partials.alerts')
        @yield('content')
      </div>
    </section>
    @include('partials.footer')
    <script src="/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
  </body>
</html>
