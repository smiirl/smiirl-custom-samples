# Smiirl Custom Counter Libraries

## Packages
Some packages can help you to build your own case faster.
#### PHP + Composer
[https://packagist.org/packages/smiirl/smiirl-library-php](https://packagist.org/packages/smiirl/smiirl-library-php)

#### Node + Npm
[https://www.npmjs.com/package/@smiirl/smiirl-library-js](https://www.npmjs.com/package/@smiirl/smiirl-library-js)  

#### Module prestashop
[https://github.com/smiirl/prestashop-module](https://github.com/smiirl/prestashop-module)


## Counter Option

There are two ways to set a number on a Smiirl custom counter:
- `JSON URL` 
- `PUSH NUMBER`.

For `JSON URL`, the counter is active and will call an external url at regular time intervals 
(chosen on the settings of the counter under `REACTIVITY`).

For `PUSH NUMBER`, the counter is passive and waits external calls to update its number.

First choose the most adapted way for your case and follow the corresponding section.

### JSON URL
The main configuration steps:
1. Expose your code to your own url "http://xxxx".
    - Send a response with the 'Content-type' `application/json`
    - It should contain something like
    ```json 
    {
        "number": 42
    }
    ```
    
2. In https://my.smiirl.com:
    - Go to the Settings of your counter.
    - Change its options to `JSON URL`. 
    - Set the `url` with the one exposed in step 1.
    - Eventually choose the attribute you want to show if your json has several ones.
    - Eventually customize the polling interval (reactivity) .
    - Save your settings.
    
### PUSH NUMBER
In https://my.smiirl.com:
- Go to the `Settings` of your counter.
- Change its options to `"PUSH NUMBER"`. 
- Collect the `CURL Endpoint` of your counter;
 it should look like 
```http://api.smiirl.com/YOU_MAC/set-number/YOUR_TOKEN/YOUR_NUMBER```. 
- Request this url in your code (`GET`)
- Execute your code.


## Concrete Examples
- [`JSON URL`](/samples/JSON_URL_EXAMPLES.md)
- [`JPUSH NUMBER`](/samples/PUSH_NUMBER_EXAMPLES.md)