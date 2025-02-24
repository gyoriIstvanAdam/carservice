<!DOCTYPE html>
                                  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
                                  <head>
                                      <meta charset="utf-8">
                                      <meta name="viewport" content="width=device-width, initial-scale=1">
                                  
                                      <title inertia>{{ config('app.name', 'Laravel') }}</title>
                                      @routes
                                      @vite('resources/js/app.js')
                                      @inertiaHead
                                      @production
                                      @endproduction
                                  </head>
                                  <body class="font-sans antialiased">
                                      @inertia
                                      @production
                                      @endproduction
                                  </body>
                                  </html>