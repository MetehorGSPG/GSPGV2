<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">
  <head>
    <title>Gestion des stages</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
  </head>
  <body>
    <div id="page">
      <div id="entete">
        <img src="{{ asset('images/greta.bmp')}}" id="greta" alt="greta" title="Greta météhor" />
        <h1>Gestion des stages</h1>
      </div>
      @yield('menu') 
      @yield('contenu1') 
      @yield('contenu2') 
     </div>
        
    </body>
  </html>
