This example allows you to turn your Custom Counter into a digital asset tracker!

1.  `composer install`
2.  Host your `price.php` on your server under your own domain "http://mycounterproject.mybusiness.com".
3.  In https://my.smiirl.com:
    - Go to the Settings of your counter.
    - Change its options to `JSON URL`.
    - Set the url to the one exposed in step 1.
    - optionnaly change the asset watched and/or the currency
      - add a GET parameters `asset` to change the "bitcoin" default (use an "id" from the list here: https://api.coingecko.com/api/v3/coins/list)
      - add a parameter `currency` to change the "usd" default (list here: https://api.coingecko.com/api/v3/simple/supported_vs_currencies)
      - Example: show the ETH in euros -> http://mycounterproject.mybusiness.com/price.php?asset=ethereum&currency=eur
    - Save your settings.
