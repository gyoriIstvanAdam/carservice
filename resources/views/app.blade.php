<!DOCTYPE html>
                                  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
                                  <head>
                                      <meta charset="utf-8">
                                      <meta name="viewport" content="width=device-width, initial-scale=1">
                                  
                                      <title inertia>{{ config('app.name', 'Laravel') }}</title>
                                  
                                      <!-- Fonts -->
                                      <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
                                  
                                      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
                                      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
                                      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
                                      <link rel="manifest" href="/site.webmanifest">
                                  
                                      <!-- Scripts -->
                                      @routes
                                      @vite('resources/js/app.js')
                                      @inertiaHead
                                      @production
                                          <!-- Google Tag Manager -->
                                          <script>(function (w, d, s, l, i) {
                                                  w[l].push({
                                                      'gtm.start':
                                                          new Date().getTime(), event: 'gtm.js'
                                                  });
                                                  var f = d.getElementsByTagName(s)[0],
                                                      j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                                                  j.async = true;
                                                  j.src =
                                                      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                                                  f.parentNode.insertBefore(j, f);
                                              })(window, document, 'script', 'dataLayer', 'GTM-5L546FJM');</script>
                                          <!-- End Google Tag Manager -->
                                      @endproduction
                                  </head>
                                  <body class="font-sans antialiased">
                                      @inertia
                                      @production
                                          <!-- Google Tag Manager (noscript) -->
                                          <noscript>
                                              <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5L546FJM" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                                          </noscript>
                                          <!-- End Google Tag Manager (noscript) -->
                                      @endproduction
                                  </body>
                                  </html>