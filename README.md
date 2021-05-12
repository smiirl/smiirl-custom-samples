
# Smiirl Custom Counter Documentation & Libraries

Welcome to the Smiirl Custom Counter official documentation 🥁 

In case you missed it: this incredible piece of hardware can display any figure in real time! It's a great way to stay connected to the figures that matter most to you or your business.

The Counter can display data parsed into a JSON webpage or waits for external calls to update its number. It therefore requires a bit of technical know-how. 

The objective of this repo is to help developers understand the ins and outs of connecting your data to a Custom Counter. 

We feature explanations and real-life code for use cases with services such as YouTube or Facebook Ads; obviously free to use for your own application!


What other services would you like to see documented here? You love the Counter and would like to contribute to this repo? 

Please email us to partnership@smiirl.com for any request. We would love to hear from you ❤️


![CU_Batch3_Statique_Classique_1](https://user-images.githubusercontent.com/9904720/117823144-72ac3580-b26d-11eb-8f61-57e06192698c.jpeg)


## Packages
To get started, you may want to install the following packages. They help you transfer your data to the Couner with 1 line of code. 
#### PHP + Composer
We have it in PHP: [https://packagist.org/packages/smiirl/smiirl-library-php](https://packagist.org/packages/smiirl/smiirl-library-php)

#### Node + Npm
And in JavaScript: [https://www.npmjs.com/package/@smiirl/smiirl-library-js](https://www.npmjs.com/package/@smiirl/smiirl-library-js)  

#### Prestashop module
You can install it in your Prestashop back office to display your sales data in real time without writing a single line of code. No shit.
[https://github.com/smiirl/prestashop-module](https://github.com/smiirl/prestashop-module)


## Counter Connection Options

There are 2 ways to connect a number to a Smiirl Custom Counter:
- `JSON URL` 
- `PUSH NUMBER`.

For `JSON URL`, the counter is active and will call an external url at regular time intervals 
(chosen on the settings of the counter under `REACTIVITY`).

For `PUSH NUMBER`, the counter is passive and waits for external calls to update its number.

First choose the most adapted way for your application and follow the corresponding section.

### JSON URL
The main configuration steps:
1. Host your code on your server under your own url "http://mycounterproject.mybusiness.com".
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
    - If applicable, choose the attribute you want to show if your json has several ones.
    - If applicable, customize the polling interval (reactivity).
    - Save your settings.
    
### PUSH NUMBER
In https://my.smiirl.com:
- Go to the `Settings` of your counter.
- Change its options to `"PUSH NUMBER"`. 
- Collect the `CURL Endpoint` of your counter;
 it should look like 
```http://api.smiirl.com/YOU_MAC/set-number/YOUR_TOKEN/YOUR_NUMBER```. 
- Request this url in your code (`GET`).
- Execute your code.


## Concrete Examples
Click the sections below to review the code for simple and more real-life projects 🤓
- [`JSON URL`](/samples/JSON_URL_EXAMPLES.md)
- [`JPUSH NUMBER`](/samples/PUSH_NUMBER_EXAMPLES.md)
