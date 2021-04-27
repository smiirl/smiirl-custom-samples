# A basic asynchronous Json Api in python
This example shows how to create an endpoint
allowing to expose a json with a fixed number
and showing it into a counter.

1. Install the requirements
```
pip install aiohttp
```

2. Expose the hello_world.py to your own url "http://xxxx".
```
python async_json.py
```

3. In https://my.smiirl.com:
    - Go to the Settings of your counter
    - Change its options to `JSON URL`.
    - Set the url the one exposed in step 1.
    - Save your settings