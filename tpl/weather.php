<?php

if ($_SESSION['lang']=="th"){
   echo '<a href="http://www.accuweather.com/ru/by/minsk/28580/weather-forecast/28580" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1464425830023" class="aw-widget-current"  data-locationkey="28580" data-unit="c" data-language="ru" data-useip="false" data-uid="awcc1464425830023"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>';
                
 
}elseif ($_SESSION['lang']=="fr") {
           echo '<a href="http://www.accuweather.com/fr/fr/paris/623/weather-forecast/623" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1464425625791" class="aw-widget-current"  data-locationkey="623" data-unit="c" data-language="fr" data-useip="false" data-uid="awcc1464425625791"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>';
             }elseif ($_SESSION['lang']=="ru") {
                 echo '<a href="http://www.accuweather.com/ru/by/minsk/28580/weather-forecast/28580" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1464425830023" class="aw-widget-current"  data-locationkey="28580" data-unit="c" data-language="ru" data-useip="false" data-uid="awcc1464425830023"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>';
                 
             }  else {
                 echo '<a href="http://www.accuweather.com/en/gb/london/ec4a-2/weather-forecast/328328" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1464426015372" class="aw-widget-current"  data-locationkey="328328" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1464426015372"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>'; 
             }
         ?>