<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                background-color: #f4f4f4;
                margin: 0;
            }
    
            .container {
                width: 80%;
                margin: 2rem auto;
                background-color: #fff;
                padding: 1.5rem;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
    
            h1 {
                color: #446688;
                text-align: center;
            }
    
            .card {
                margin: 1rem 0;
                padding: 1rem;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
    
            h2 {
                color: #446688;
                margin-top: 1rem;
            }
    
            table {
                width: 100%;
                margin-top: 1rem;
                border-collapse: collapse;
            }
    
            th, td {
                padding: 0.75rem;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
    
            .btn {
                display: inline-block;
                padding: 0.5rem 1rem;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-decoration: none;
            }
    
            .btn-primary {
                background-color: #4CAF50;
                color: white;
            }
    
            .btn-primary:hover {
                background-color: #45a049;
            }
    
            .no-courses {
                margin-top: 1rem;
                color: #777;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
