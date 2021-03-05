@extends('layouts.layout')
@section('content')
<div class="row justify-content-center" id="authc">

    <div class="col-xs-6">
        <div class="">
            <img src="{{ asset("assets/images/author.jpg") }}" class="authimg" alt="author picture" width="400px" height="500px">
        </div>
    </div>

    <div class="col-xs-6 righta">
        <div class="single-widget-area about-me-widget">
            <div class="widget-title">
                <h2 id="ah6">Author</h2>
            </div>
            <div>
            <ul>
                <li>
                    Name: <h4 class="font-shadow-into-light">Nikola Banic</h4>
                </li>
                <li>
                    Age: <h4 class="font-shadow-into-light">22</h4>
                </li>
                <li>
                    About: <p class="font-shadow-into-light">Coming from Cacak, I graduated from the Secondary Technical School in Cacak - majoring in Computer Engineering. I am currently in my 3rd year at the ICT College - IT major. This site was created for the purpose of the PHP2 course requirement.</p>
                </li>
                <li>
                    LinkedIn profile:
                </li>
                <li>
                    <a class="lnk" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fnikola-banic-69853a187%3Ffbclid%3DIwAR0oH95NwWN0bVeRu-BZnKoQapgR73B_iPG4okApBs-CBJtX-AH1irJXBbg&h=AT0Yh_U2khVMOjPh9DkSTfiKcw-10xkKbCg24pM4t-NgFeC75HhU-iMsd2qIzvndwhLVu9CPr1mvec1o9ScWHlp1oXtnAgIhQ1Ia_LzrAVL0YbMaxb1rXKollF3YSbf2GvBtCQ">LinkedIn</a>
                </li>
                <li>
                    Documentation:
                </li>
                <li>
                    <a class="lnk" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fnikola-banic-69853a187%3Ffbclid%3DIwAR0oH95NwWN0bVeRu-BZnKoQapgR73B_iPG4okApBs-CBJtX-AH1irJXBbg&h=AT0Yh_U2khVMOjPh9DkSTfiKcw-10xkKbCg24pM4t-NgFeC75HhU-iMsd2qIzvndwhLVu9CPr1mvec1o9ScWHlp1oXtnAgIhQ1Ia_LzrAVL0YbMaxb1rXKollF3YSbf2GvBtCQ">Documentation</a>
                </li>
            </ul>
            </div>
        </div>

    </div>
</div>
@endsection
