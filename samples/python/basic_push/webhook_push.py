# tested on python 3.9

import urllib, json
import urllib.request

# change those lines to fit to your device (check it on https://my.smiirl.com) and your data
counterMac = 'e08e3c37e386'
counterToken = 'cb8822a2b6ef2b1391aa1ba55c08c5b5'
numberToShow = 12345

url = "http://api.smiirl.com/" + counterMac + "/set-number/" + counterToken + "/" + str(numberToShow)
req = urllib.request.Request(url)
r = urllib.request.urlopen(req).read()
cont = json.loads(r.decode('utf-8'))
found = False

# parsing json
for item in cont:
    if item == 'status' and cont[item] == 200:
        # print("number successfully pushed")
        found = True
# if(not found):
#    print("number push failed")

