# Rating

Got some ratings in your database, but do you need to nicely present it? You can easily do that!

## Usage
Combined with FontAwesome, the following code:
```php
<style type="text/css">
    .rating-icon {
        color: rgb(55, 200, 55);
    }
</style>

<?php

$ratingFormatter = new RatingFormatter();
$ratingFormatter->setFilledIcon('<i class="fa fa-star rating-icon"></i>');
$ratingFormatter->setHalfFilledIcon('<i class="fa fa-star-half-o rating-icon"></i>');
$ratingFormatter->setEmptyFilledIcon('<i class="fa fa-star-o rating-icon"></i>');

$ratingFormatter->setMaximumRating(5);
$ratingFormatter->setRating('3.5');

echo $ratingFormatter->getFormattedRating();

?>
```
gives you this result:
![Example rating](https://i.imgur.com/N42rxo4.png)

Of course you can use images as well.

---------------

![Rating format preview](https://i.imgur.com/kosdIce.png)
