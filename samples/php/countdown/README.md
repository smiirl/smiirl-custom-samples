
This example shows a count-down in a counter

# Expose php
make executable and expose the countdown_json.php to your own url `http://xxxx`.

# Choose url
Change your counter to "json" mode and set the url

## Predefined example:

possible values:
- daysUntilLaunch
- MinutesToMidnight
- hoursBeforeNewYearsEve

url example for the number of jours befor new year's eve: 
`http://xxxx/countdown_json.php?example=hoursBeforeNewYearsEve`

## DateTime and Unit

possible unit values:
- year
- week
- day
- hour
- minute
- second

url example for the remaining hours before the 25th december at midnight:   
`https://xxxx/countdown_json.php?dateTime=2042-12-25%2000:00:00&unit=hour` 

## Time String and Unit

possible unit values:
- year
- week
- day
- hour
- minute
- second

url example for remaining hours before Sunday 10PM:   
`http://xxxx/countdown_json.php?timeStr=this%20sunday%2010PM&unit=hour`
