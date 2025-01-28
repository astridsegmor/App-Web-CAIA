<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<title>Aplicación WEB Departamento CAIA - UMO TRUJILLO</title>
	<link rel="stylesheet" href="../../CaiaIpasme/public/styles.css">
    <link href="../../CaiaIpasme/public/styleNunito.css" rel="stylesheet">
</head>
    <style>
            .text-sm{font-size:.875rem}
            .text-lg{font-size:1.125rem}
            .leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}
            .ml-1{margin-left:.25rem}
            .mt-2{margin-top:.5rem}
            .mr-2{margin-right:.5rem}
            .ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}
            .overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}
            .fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}
            .shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}
            .text-center{text-align:center}
            .text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}
            .text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}
            .text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}
            .text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}
            .text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}
            .text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}
            .text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}
            .underline{text-decoration:underline}
    </style>

    <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
    </style>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-blue-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Login') }}</a>

                    <!--@if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register')}}</a>
                    @endif-->
                @endauth
            </div>
        @endif

    <div class="wrapper">
        <nav>
        <img src="../../img/cintilloIpas.jpg" alt="fondo">
        <div class="sp">
            <ul class="menu">
                <li>
                    <a href="{{ url('/') }}"><h4>Inicio</h4></a>
                </li>
                <li>
                    <a href="{{ url('/info') }}"><h4>¿Quienes Somos?</h4></a>
                </li>
                <li>
                    <a href="{{url('/RyA')}}"><h4>Registro y Control de Afiliados</h4></a>
                </li>
                <li>
                    <a href="#"><h4>Servicios</h4></a>
                </li>
                <li>
                    <a href="{{url('/acercaDe')}}"><h4>Acerca de</h4></a>
                </li>
            </ul>
        </div>
        </nav>
        <cuerpo class="main">
            <center>
            <h1 style="font-family:'Nunito', sans-serif; font-weight:bold;">Servicios que ofrece la Institución</h1><br>
                <h3 style="font-family:'Nunito', sans-serif; font-weight:bold;">
                    <a  href="http://www.ipasme.gob.ve/index.php?option=com_sppagebuilder&view=page&id=28&Itemid=687" target="_blank">Créditos Integrales e Hipotecarios</a></h3>
                <h3 style="font-family:'Nunito', sans-serif; font-weight:bold;">
                    <a  href="http://www.ipasme.gob.ve/index.php?option=com_sppagebuilder&view=page&id=32&Itemid=688" target="_blank">Afiliación y Contribuciones</a></h3>
                <h3 style="font-family:'Nunito', sans-serif; font-weight:bold;">
                    <a  href="http://www.ipasme.gob.ve/index.php?option=com_sppagebuilder&view=page&id=50&Itemid=738" target="_blank">Cultura, Recreación, Deportes y Turismo</a></h3>
                <h3 style="font-family:'Nunito', sans-serif; font-weight:bold;">
                    <a  href="http://www.ipasme.gob.ve/index.php?option=com_sppagebuilder&view=page&id=42&Itemid=681" target="_blank">Salud Integral</a></h3>
                <h3 style="font-family:'Nunito', sans-serif; font-weight:bold;">
                    <a  href="http://www.ipasme.gob.ve/index.php?option=com_sppagebuilder&view=page&id=73&Itemid=750" target="_blank">Atención Ciudadana</a></h3>
            </center>
        </cuerpo>
       <footer class="footer-links">
        <contenido class="footer-container">
            <faceb class="face">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://es-la.facebook.com/IpasmeOficial/">
                        <img class="sppb-img-responsive" src="../../img/br_f.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </faceb>
            <twix class="twi">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/IpasmeOficial?ref_src=twsrc%5Etfw">
                        <img class="sppb-img-responsive" src="../../img/br_t_2.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </twix>
            <inst class="ins">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.instagram.com/ipasmeoficialgob/">
                        <img class="sppb-img-responsive" src="../../img/br-i.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </inst>
            <yout class="you">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.youtube.com/channel/UCLOD_y8VtKYiQW2V8sw589g">
                        <img class="sppb-img-responsive" src="../../img/br-y.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </yout>
            <tikt class="tik">
                <ul>
                    <li>
                    <a rel="noopener noreferrer" target="_blank" href="https://www.tiktok.com/@ipasme_oficial">
                        <img class="sppb-img-responsive" src="../../img/br_tt.jpg" alt="Image" title="" loading="lazy">
                    </a>
                    </li>
                </ul>
            </tikt>
        </contenido>

        </footer>
        <footer2 class="footer-links2">
            <div class="ml-4 text-center text-sm text-white-500 sm:text-right sm:ml-0">
                UMO IPASME - TRUJILLO Av. García de Paredes Sector Santa Rosa
            </div>
        </footer2>
    </div>
    </div>
</body>
</html>