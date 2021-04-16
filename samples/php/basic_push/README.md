
This example pushes a fixed number in a counter
- Make sure that `php-curl` is installed and enabled
- In https://my.smiirl.com:
    - Go to the `Settings` of your counter
    - Change its options to `"PUSH NUMBER"`. 
    - Get the `CURL Endpoint` of your counter
- Put it in `webhook_push.php` and make it executable.
- Execute it:
```
php webhook_push.php
```
 