
This example allows you to turn your Custom Counter into a countdown timer.

```
composer install
```
# Expose php

Make executable and host your `countdown_json.php` file on your server under your own url "http://mycounterproject.mybusiness.com".

# Choose url
In https://my.smiirl.com:
- Go to the Settings of your counter.
- Change its options to `JSON URL`. 
- Set the url to the one above.
- Save your settings.

## Predefined example:

Possible values:
- daysUntilLaunch
- MinutesToMidnight
- hoursBeforeNewYearsEve

Url example for the number of days before new year's eve: 
`http://xxxx/countdown_json.php?example=hoursBeforeNewYearsEve`

## DateTime and Unit

Possible unit values:
- year
- week
- day
- hour
- minute
- second

Url example for the remaining hours before the 25th december 2042 at midnight:   
`https://xxxx/countdown_json.php?dateTime=2042-12-25%2000:00:00&unit=hour` 

## Time String and Unit

Possible unit values:
- year
- week
- day
- hour
- minute
- second

Url example for remaining hours before Sunday 10PM:   
`http://xxxx/countdown_json.php?timeStr=this%20sunday%2010PM&unit=hour`
