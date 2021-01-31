<?php
/**
 * Created by PhpStorm.
 * User: Umar
 * Date: 12.02.2019
 * Time: 15:31
 */

//Yii::$app->helper->dump($params);
$this->title = 'Карта AкмаCard'
?>

<div class="map" id="map"></div>
<script src="https://api-maps.yandex.ru/2.1/?apikey=1a31bb19-b3c6-4d20-9470-c3e8b5da7b1b&lang=ru_RU" type="text/javascript">
</script>
<script>



    ymaps.ready(init);
    function init(){
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            center: [39.656842, 66.964540],
            zoom: 13
        });

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'params',
            success: function (data) {
                for(var i in data){
                    addMarker(data[i]);
                }
            }
        });

        function addMarker(params){
            var marker = new ymaps.Placemark([params[1], params[2]], {
                hintContent: params[0],
                balloonContent: '<img src="/'+ params[3] +'" height="50px"><br>' + params[0]
            });

            myMap.geoObjects.add(marker);
        }

    }
</script>


