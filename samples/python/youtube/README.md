# Display your YouTube channel subscribers 😎

A Custom Counter connected to YouTube is must-have tool for any YouTuber! 

The code presented here allows you to display the **number or followers** or **total video views** on a YouTube channel.

<img width="1680" alt="Screenshot 2021-05-12 at 09 47 19" src="https://user-images.githubusercontent.com/9904720/117938346-39c09f00-b307-11eb-9919-906ba3f1b4d3.png">


## Get started

- get your `channelId` from youtube.
- get your `api-key` from https://console.developers.google.com/apis/credentials 
- Run the `youtube_json.py` to listen your own url "http://youtubecounter.mybusiness.com" (code tested on python 3.9)
- In https://my.smiirl.com:
    - change your counter to "json" mode and set the url to the previous one. 
    - choose json attribute to choose what you want to show: 
        - `suscribers` for the number of suscribers of the channel
        - `views` for the total number of views of the channel
    - Save your settings.
- Sit back and watch 🤩


# What you need to know about the Youtube API
For more details, check the youtube API documentation: 
https://developers.google.com/youtube/v3/docs/channels.

## Data accuracy
The `total number of views` is precise to one unit.

The `number of followers` is rounded by YouTube:
 - 12,345 ⇒ 12,300
 - 123,456 ⇒ 123,000
 - 1,234,456 ⇒ 1,230,000)
 
## Rate limit
Each API call about channels cost 1 unit and a standard user has 10 000 units per day.
To avoid rate limit issues, set the "Reactivity" parameter of your counter to at least 10 seconds.
More details on https://developers.google.com/youtube/v3/determine_quota_cost.
