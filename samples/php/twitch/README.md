# Display your Twitch subscriber count 😎

![178400762_199577778445617_1384783600845623641_n](https://user-images.githubusercontent.com/9904720/168776822-a94a752b-dcef-432d-a9f1-dcd49a8f3031.jpg)


A Smiirl Custom Counter connected to Twitch is a must-have tool for any Twitch streamer! 

The code presented here allows you to display the **number of followers** of any Twitch account.

## Get started
```
  composer install
  ```
- Create your Twitch app and get its `Client ID` and `Client Secret`: https://dev.twitch.tv/console/apps/.
- Get the `Account Id` that you want to display. You can easily get it with a tool like: https://www.streamweasels.com/tools/convert-twitch-username-to-user-id/
- Complete your `twitch.php` with previous values, and expose it under your own url "http://twitchcounter.mybusiness.com/twitch.php". 
- In https://my.smiirl.com:
    - Go to the Settings of your counter
    - Change its options to `JSON URL`. 
    - Set the url to the one above. 
    - Choose the attribute you want to show ("number"): 
    - Save your settings.
- Sit back and watch 🤩

# What you need to know about the Twitch API
For more details, check out the Twich API documentation: 
[https://dev.twitch.tv/docs/api/reference#get-users-follows](https://dev.twitch.tv/docs/api/reference#get-users-follows)
 
## Rate limit
To avoid rate limit issues, set the "Reactivity" parameter of your counter to at least 10 seconds and adapt it if necessary: more details on [https://dev.twitch.tv/docs/api/guide#rate-limits](https://dev.twitch.tv/docs/api/guide#rate-limits).
