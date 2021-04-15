# Smiirl Custom Counter Usages
There are two ways to set a number on a Smiirl custom counter:
- `JSON URL` 
- `PUSH NUMBER`.

For `JSON URL`, the counter is active and will call an external url at regular time intervals 
(chosen on the settings of the counter under `REACTIVITY`).

For `PUSH NUMBER`, the counter is passive and waits external calls to update its number.

First choose the most adapted way for your case and follow the corresponding section.

## JSON URL
The main configuration steps:
1. Expose your code to your own url "http://xxxx".
2. In https://my.smiirl.com:
    - Go to the Settings of your counter
    - Change its options to `JSON URL`. 
    - Set the `url` the one exposed in step 1.
    - Eventually choose the attribute you want to show if your json has several ones. 
    - Save your settings

For concrete cases, see [real examples](/samples/JSON_URL_EXAMPLES.md).

## PUSH NUMBER
In https://my.smiirl.com:
- Go to the `Settings` of your counter
- Change its options to `"PUSH NUMBER"`. 
- Collect the `CURL Endpoint` of your counter;
 it should look like 
```http://api.smiirl.com/YOU_MAC/set-number/YOUR_TOKEN/YOUR_NUMBER``` 
- Request this url in your code
- Execute your code.

For concrete cases, see [real examples](/samples/PUSH_NUMBER_EXAMPLES.md).
