# Digital marketers: display your Facebook Ads spend 💸

If you are a digital marketer managing Facebook Ads campaigns for your business or clients, you may be interested in this tutorial. 

The code presented here allows you to display the total Facebook Ads spend combined from several ads accounts.

![Screenshot 2021-05-12 at 10 51 39](https://user-images.githubusercontent.com/9904720/117947776-cde33400-b310-11eb-86b3-c65ab794000e.jpeg)



## Get started

1.   ```composer install```
1. Create a facebook App: 
    - Use "Create App" in https://developers.facebook.com/apps/ 
    - In your app > Settings > Basic: get the app id and its secret
1. Get a long live token with this app
    - Go to https://developers.facebook.com/tools/explorer/
    - Query 
 
    ```oauth/access_token?grant_type=fb_exchange_token&client_id={app-id}&client_secret={app-secret}&fb_exchange_token={your-access-token}```

    - Get the ```access_token``` field of the response -> ```{long-token}```. 
1. Get your ads accounts on https://developers.facebook.com/tools/explorer/ 
     - Query 
         ```me?fields=id,name```
         to get your userId 
     - Query  
         ```tonUserId/adaccounts?fields=name,account_id,id```
         to get your accounts ids
1. Fill your array of access in facebook_spend_json.php 
    - With keys along the account ids 
    - With value the corresponding (long-life) token 
1. Host your `facebook_spend_json.php` file on your server under your own url "http://mycounterproject.mybusiness.com".
3. In https://my.smiirl.com:
    - Go to the Settings of your counter
    - Change its options to `JSON URL`. 
    - Set the url to the one exposed in the previous step.
    - Save your settings.
4. Sit back and enjoy 🤩


 
