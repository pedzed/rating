<?php

use pedzed\rating_system\RatingFormatter;

spl_autoload_register(function($class){
    $dirs = [
        dirname(__DIR__).'/src/',
    ];
    
    foreach($dirs as $dir){
        $file = str_replace('\\', '/', rtrim($dir, '/').'/'.$class.'.php');
        
        if(is_readable($file)){
            require_once($file);
            break;
        }
    }
});

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <title>Rating Examples</title>
        
        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.0/css/foundation.min.css" />
        
        <style type="text/css">
            .rating-icon {
                color: rgb(200, 55, 55);
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="large-12 columns">
                <h1>Rating Examples</h1>
            </div>
            <?php
            $maxRatings = range(1, 5);
            $maxRatings[] = 10;
            
            $ratings = [
                '1',
                '1.1',
                '1.25',
                '1.4',
                '1.49',
                '1.5',
                '1.75',
                '1.9',
                '2',
                '3',
            ];
            
            $ratingFormatter = new RatingFormatter();
            $ratingFormatter->setFilledIcon('<i class="fa fa-star rating-icon"></i>');
            $ratingFormatter->setHalfFilledIcon('<i class="fa fa-star-half-o rating-icon"></i>');
            $ratingFormatter->setEmptyFilledIcon('<i class="fa fa-star-o rating-icon"></i>');
            
            foreach($maxRatings as $maxRating) {
                $ratingFormatter->setMaximumRating($maxRating);
                ?>
                <div class="medium-6 large-4 columns">
                    <div class="panel">
                        <?php
                        foreach($ratings as $rating) {
                            $ratingFormatter->setRating($rating);
                            
                            echo $ratingFormatter->getFormattedRating();
                            echo ' - <b>'.$rating.'/'.$maxRating.'</b><br />';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </body>
</html>
