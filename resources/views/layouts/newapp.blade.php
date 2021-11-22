<!doctype html>
<html lang="eng">
    <head>
        <title>
            CSC348 Coursework -@yield('title')
        </title>
    </head>

    <body>
        <h1> 
            CSC348 Coursework -@yield('title')
        </h1>

        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            @yield('content')
        </div>

    </body>