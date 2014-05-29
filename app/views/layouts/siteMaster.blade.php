<!DOCTYOE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description"content="Free Web Emails">
        <meta name="keywords"content="Email,Send,Web,Message">
        <title>Arobs Emails</title>
        <link href="{{URL::to('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{URL::to('css/custom/site.main.css')}}" rel="stylesheet">
        <link href="{{ URL::to('css/plugins/multiple-select.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('layouts/partials/siteHeader')
        <div>
            @yield('content')
        </div>
        @include('layouts/partials/siteFooter')
        <script>
            var baseUrl = "{{ URL::to('') }}";
        </script>
        
        <script src="{{ URL::to('js/jquery.js') }}"></script>
        <script src="{{ URL::to('js/bootstrap.js') }}"></script>
        <script src="{{ URL::to('js/plugins/jqueryvalidation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ URL::to('js/plugins/jquery.multiple.select.js') }}"></script>
        <script src="{{ URL::to('js/custom/site.main.js') }}"></script>
        
        @yield('additionalScripts')
    </body>
</html>