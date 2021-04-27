
This example shown the **number or followers** (or total views) **of a youtube channel**.
```
  composer install
  ```
- get your `channelId` from youtube.
- get your `api-key` from https://console.developers.google.com/apis/credentials 
- Expose the `youtube_json.php` to your own url "http://xxxx".
- In https://my.smiirl.com:
    - Go to the Settings of your counter
    - Change its options to `JSON URL`. 
    - Set the url to the one above. 
    - Choose the attribute you want to show: 
        - `subscribers` for the number of subscribers of the channel
        - `views` for the total number of views of the channel
    - Save your settings.    

# Youtube api
For more details, check the youtube API documentation: 
https://developers.google.com/youtube/v3/docs/channels.

## Data accuracy
The `total number of views` is precise to one unit.

The `number of followers` is rounded by youtube:
 - 12,345 ⇒ 12,300
 - 123,456 ⇒ 123,000
 - 1,234,456 ⇒ 1,230,000)
 
## Rate limit
Each API call about channels cost 1 unit and a standard user has 10 000 units per day.
To avoid rate limit issues, set the "Reactivity" parameter of your counter to at least 10 seconds.
More details on https://developers.google.com/youtube/v3/determine_quota_cost.