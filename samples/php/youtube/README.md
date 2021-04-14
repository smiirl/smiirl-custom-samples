
This example shown the **number or followers** (or total views) **of a youtube channel**.
- make sure that php-curl is installed and unabled
- get your api-key from https://console.developers.google.com/apis/credentials 
- Expose the youtube_json.php to your own url "http://xxxx".
- In https://my.smiirl.com, change your counter to "json" mode and set the url to the previous one. 
- In https://my.smiirl.com, choose json attribute (in my.smiirl) to choose what you want to show: 
  - "number" for the number of suscribers of the channel
  - "count" for the total number of views of the channel

# Youtube api
For more details, check the youtube API documentation: 
https://developers.google.com/youtube/v3/docs/channels.

## Rate Limit
Each API call about channels cost 1 unit and a standard user has 10 000 units per day.
To avoid rate limit issues, set the "Reactivity" parameter of your counter to at least 10 seconds.
More details on https://developers.google.com/youtube/v3/determine_quota_cost.
