<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">

        <title>404 - {{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <style>
            :root {
                color-scheme: dark;
                --background: #000;
                --panel: #050505;
                --border: rgb(255 255 255 / 0.1);
                --text: #f5f5f5;
                --muted: #8b8b92;
            }

            * {
                box-sizing: border-box;
            }

            body {
                align-items: center;
                background: var(--background);
                color: var(--text);
                display: flex;
                font-family: Inter, ui-sans-serif, system-ui, sans-serif;
                justify-content: center;
                margin: 0;
                min-height: 100vh;
                padding: 2rem;
            }

            main {
                align-items: center;
                background: var(--panel);
                border: 1px solid var(--border);
                border-radius: 0.5rem;
                display: flex;
                flex-direction: column;
                max-width: 28rem;
                padding: 2.5rem;
                text-align: center;
                width: 100%;
            }

            img {
                height: 6rem;
                margin-bottom: 1.5rem;
                width: 6rem;
            }

            p {
                color: var(--muted);
                font-size: 0.875rem;
                line-height: 1.6;
                margin: 0.75rem 0 0;
            }

            a {
                border: 1px solid var(--border);
                border-radius: 0.375rem;
                color: var(--text);
                display: inline-flex;
                font-size: 0.875rem;
                font-weight: 600;
                margin-top: 1.5rem;
                padding: 0.625rem 0.875rem;
                text-decoration: none;
            }

            a:hover {
                background: rgb(255 255 255 / 0.06);
            }

            .code {
                color: var(--muted);
                font-family: 'JetBrains Mono', 'SFMono-Regular', Consolas, monospace;
                font-size: 0.75rem;
                margin-bottom: 0.75rem;
            }

            .title {
                font-size: 1.5rem;
                font-weight: 700;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <main>
            <img src="{{ asset('dox-sh.png') }}" alt="dox.sh">

            <div class="code">404</div>
            <h1 class="title">Не знайдено</h1>
            <p>Запитана сторінка не існує або більше недоступна.</p>

            <a href="{{ url('/admin') }}">Повернутися до адмінпанелі</a>
        </main>
    </body>
</html>
