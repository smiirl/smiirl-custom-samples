
This example shows time in a counter
1.   ```composer install```
1. Create a facebook App: 
    - use "Create App" in https://developers.facebook.com/apps/ 
    - In your app > Settings > Basic: get the app id and its secret
1. Get a long live token with this app
    - go to https://developers.facebook.com/tools/explorer/
    - query 
 
    ```oauth/access_token?grant_type=fb_exchange_token&client_id={app-id}&client_secret={app-secret}&fb_exchange_token={your-access-token}```

    - get the ```access_token``` field of the response -> ```{long-token}```. 
1. Get your ads accounts on https://developers.facebook.com/tools/explorer/ 
     - query 
         ```me?fields=id,name```
         to get your userId 
     - query  
         ```tonUserId/adaccounts?fields=name,account_id,id```
         to get your accounts ids
1. Fill your array of access in facebook_spend_json.php 
    - with keys along the account ids 
    - with value the corresponding (long-life) token 
1. Expose the `facebook_spend_json.php` to your own url "http://xxxx".
1. In https://my.smiirl.com:
    - Go to the Settings of your counter
    - Change its options to `JSON URL`. 
    - Set the url to the one exposed in the previous step.
    - Save your settings.


 