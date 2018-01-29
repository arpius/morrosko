<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') - Morrosko!</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css" integrity="sha256-2k1KVsNPRXxZOsXQ8aqcZ9GOOwmJTMoOB5o5Qp1d6/s=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css" integrity="sha256-CfN2r6i/dqkUHVRqpBzO3w21SnIWalwGfj5ScBPVzmI=" crossorigin="anonymous" />
    </head>

    <body>
        <header>
            <section class="hero is-primary">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Morrosko!
                        </h1>
                        <h2 class="subtitle">
                            @lang('views.stay_fit')
                        </h2>
                    </div>
                </div>
            </section>
        </header>

        <main>
            <section class="section">
                <div class="container">
                    @yield('content')
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="container">
                <div class="content">
                    <p><strong>Morrosko!</strong> by Aritz Piñero</p>
                </div>
            </div>
        </footer>
    </body>
</html>