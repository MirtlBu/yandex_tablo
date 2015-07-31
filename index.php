<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Airport tablo</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,700,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="popup__wrap">
        <div class="popup" id="popup">
            <div class="popup__table">
                <div class="popup__close" id="popup-close">&#10005;</div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Time:</div>
                    <div class="popup__tcell popup__content">
                        <span class="popup__text" data="time"></span>
                    </div>
                </div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Destination:</div>
                    <div class="popup__tcell popup__content">
                        <span class="popup__text" data="city"></span>
                        <span class="popup__text" data="airport"></span>
                    </div>
                </div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Airline:</div>
                    <div class="popup__tcell popup__content">
                        <img class="popup__img">
                        <span class="popup__text" data="airline"></span>
                    </div>
                </div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Flight:</div>
                    <div class="popup__tcell popup__content">
                        <span class="popup__text" data="flight"></span>
                    </div>
                </div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Airplane:</div>
                    <div class="popup__tcell popup__content">
                        <span class="popup__text" data="plane"></span>
                    </div>
                </div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Status:</div>
                    <div class="popup__tcell popup__content">
                        <span class="popup__text" data="status"></span>
                    </div>
                </div>
                <div class="popup__tr">
                    <div class="popup__tcell popup__title">Extra:</div>
                    <div class="popup__tcell popup__content">
                        <span class="popup__text" data="extra"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="header">
            <h1>Mirtl Bu airport</h1>
        </div>

        <div class="main">

            <input type="radio" name="flight" id="departures" class="switcher-input" checked>
            <label for="departures" class="switcher-title ">
                <span class="switcher-title__text">Departures</span>
            </label>

            <input type="radio" name="flight" id="arrivals" class="switcher-input">
            <label for="arrivals" class="switcher-title">
                <span class="switcher-title__text">Arrivals</span>
            </label>

            <div class="flight departures">
                <div class="flight__table">
                    <div class="tr flight__tr flight__header">
                        <div class="flight__tcell flight__th plane-departures">
                            <span class="flight__content">Time</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Dest.</span>
                            <span class="flight__content" title-wide>Destination</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Airl.</span>
                            <span class="flight__content" title-wide>Airline</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content">Flight</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Airp.</span>
                            <span class="flight__content" title-wide>Airplane</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content">Status</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Ext.</span>
                            <span class="flight__content" title-wide>Extra</span>
                        </div>
                    </div>

                    <?php
                        $airlines = [
                            "klm" => "KLM",
                            "airfrance" => "Air France",
                            "aeroflot" => "Aeroflot",
                            "airbaltic" => "airBaltic",
                            "alitalia" => "Alitalia",
                            "lufthansa" => "Lufthansa",
                            "swiss" => "SWISS"
                        ];
                        $status = [
                            "checkin" => "Check-in",
                            "scheduled" => "Scheduled",
                            "departed" => "Departed",
                            "inair" => "In Air",
                            "cancelled" => "Cancelled",
                            "landed" => "Landed",
                            "arrived" => "Arrived",
                            "delayed" => "Delayed"
                        ];
                        $row = [
                            ["12:25", "Geneva", "GVA", "swiss", "S5037", "A319", "Airbus 319", "inair", "klm"],
                            ["12:45", "Paris", "CDG", "airfrance", "A3750", "B700", "Boeing 700-333", "inair", "aeroflot"],
                            ["12:55", "Barcelona", "BCN", "aeroflot", "A7816", "B333", "Boeing 333-600", "departed", "-"],
                            ["13:05", "Berlin", "TXL", "klm", "K4501", "B700", "Boeing 700-333", "departed", "-"],
                            ["13:15", "Rom", "CIA", "alitalia", "A1315", "A319", "Airbus 319", "departed", "-"],
                            ["13:25", "Paris", "CDG", "aeroflot", "A2513", "B737", "Boeing 737-800", "checkin", "airfrance"],
                            ["13:35", "Moscow", "SVO", "aeroflot", "A4720", "B700", "Boeing 700-333", "checkin", "-"],
                            ["13:45", "Geneva", "GVA", "swiss", "S5037", "A319", "Airbus 319", "checkin", "-"],
                            ["13:55", "Paris", "CDG", "airfrance", "A3750", "B700", "Boeing 700-333", "checkin", "-"],
                            ["14:05", "Barcelona", "BCN", "aeroflot", "A7816", "B333", "Boeing 333-600", "checkin", "-"],
                            ["14:15", "Berlin", "TXL", "klm", "K4501", "B700", "Boeing 700-333", "delayed", "-"],
                            ["14:25", "Rom", "CIA", "alitalia", "A1315", "A319", "Airbus 319", "cancelled", "-"],
                            ["14:35", "Paris", "CDG", "aeroflot", "A2513", "B737", "Boeing 737-800", "delayed", "airfrance"],
                            ["14:45", "Moscow", "SVO", "aeroflot", "A4720", "B700", "Boeing 700-333", "checkin", "-"],
                            ["13:45", "Geneva", "GVA", "klm", "K5037", "A319", "Airbus 319", "checkin", "-"],
                            ["13:55", "Paris", "CDG", "airfrance", "A3750", "B700", "Boeing 700-333", "checkin", "-"],
                            ["14:05", "Barcelona", "BCN", "aeroflot", "A7816", "B333", "Boeing 333-600", "delayed", "-"],
                            ["14:15", "Berlin", "TXL", "klm", "K4501", "B700", "Boeing 700-333", "delayed", "-"],
                            ["14:25", "Rom", "CIA", "alitalia", "A1315", "A319", "Airbus 319", "cancelled", "-"],
                            ["14:35", "Paris", "CDG", "aeroflot", "A2513", "B737", "Boeing 737-800", "delayed", "airfrance"],
                            ["14:45", "Moscow", "SVO", "aeroflot", "A4720", "B700", "Boeing 700-333", "delayed", "-"]
                        ];
                        $dataAttr = ['time','city', 'airport', 'airline', 'flight', 'model', 'plane', 'status', 'extra', 'url'];
                        $openTagTd = '<div class="flight__tcell flight__td">';
                        $closeTagTd = "</div>";
                        $contentClass = "flight__content";
                        $imgSize = 'width="20" height="20"';
                    ?>

                    <?php foreach ($row as $key => $value) { ?>
                        <div class="flight__tr">

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[0] ?>="<?php echo $value[0] ?>" ><?php echo $value[0] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[1] ?>="<?php echo $value[1] ?>"><?php echo $value[1] ?></span>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[2] ?>="<?php echo $value[2] ?>"><?php echo $value[2] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <img class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[9] ?>="images/icon-airlines-<?php echo $value[3] ?>.png" src="images/icon-airlines-<?php echo $value[3] ?>.png" alt="<?php echo $airlines[$value[3]] ?>" <?php echo $imgSize ?> >
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[3] ?>="<?php echo $value[3] ?>"><?php echo $airlines[$value[3]] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[4] ?>="<?php echo $value[4] ?>"><?php echo $value[4] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[5] ?>="<?php echo $value[5] ?>"><?php echo $value[5] ?></span>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[6] ?>="<?php echo $value[6] ?>"><?php echo $value[6] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[7] ?>="<?php echo $value[7] ?>"><?php echo $status[$value[7]] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <?php if($airlines[$value[8]]) { ?>
                                    <img class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[9] ?>="images/icon-airlines-<?php echo $value[8] ?>.png" src="images/icon-airlines-<?php echo $value[8] ?>.png" alt="<?php echo $airlines[$value[8]] ?>" <?php echo $imgSize ?> >
                                <?php } ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[8] ?>="<?php echo $value[8] ?>"><?php echo $airlines[$value[8]] ? $airlines[$value[8]] : $value[8] ?></span>
                            <?php echo $closeTagTd ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="flight arrivals">
                <div class="flight__table">
                    <div class="tr flight__tr flight__header">
                        <div class="flight__tcell flight__th plane-departures">
                            <span class="flight__content">Time</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Dest.</span>
                            <span class="flight__content" title-wide>Destination</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Airl.</span>
                            <span class="flight__content" title-wide>Airline</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content">Flight</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Airp.</span>
                            <span class="flight__content" title-wide>Airplane</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content">Status</span>
                        </div>
                        <div class="flight__tcell flight__th">
                            <span class="flight__content" title-short>Ext.</span>
                            <span class="flight__content" title-wide>Extra</span>
                        </div>
                    </div>

                    <?php foreach (array_reverse($row) as $key => $value) { ?>
                        <div class="flight__tr">

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[0] ?>="<?php echo $value[0] ?>" ><?php echo $value[0] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[1] ?>="<?php echo $value[1] ?>"><?php echo $value[1] ?></span>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[2] ?>="<?php echo $value[2] ?>"><?php echo $value[2] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <img class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[9] ?>="images/icon-airlines-<?php echo $value[3] ?>.png" src="images/icon-airlines-<?php echo $value[3] ?>.png" alt="<?php echo $airlines[$value[3]] ?>" <?php echo $imgSize ?> >
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[3] ?>="<?php echo $value[3] ?>"><?php echo $airlines[$value[3]] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[4] ?>="<?php echo $value[4] ?>"><?php echo $value[4] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[5] ?>="<?php echo $value[5] ?>"><?php echo $value[5] ?></span>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[6] ?>="<?php echo $value[6] ?>"><?php echo $value[6] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[7] ?>="<?php echo $value[7] ?>"><?php echo $status[$value[7]] ?></span>
                            <?php echo $closeTagTd ?>

                            <?php echo $openTagTd ?>
                                <?php if($airlines[$value[8]]) { ?>
                                    <img class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[9] ?>="images/icon-airlines-<?php echo $value[8] ?>.png" src="images/icon-airlines-<?php echo $value[8] ?>.png" alt="<?php echo $airlines[$value[8]] ?>" <?php echo $imgSize ?> >
                                <?php } ?>
                                <span class="<?php echo $contentClass ?>" data-<?php echo $dataAttr[8] ?>="<?php echo $value[8] ?>"><?php echo $airlines[$value[8]] ? $airlines[$value[8]] : $value[8] ?></span>
                            <?php echo $closeTagTd ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>