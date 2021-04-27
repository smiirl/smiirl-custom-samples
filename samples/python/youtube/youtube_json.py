# tested on python 3.9
import http.server
import json
import socketserver
from http import HTTPStatus

import requests

youtubeChannelId = "UCKHzE6XF__put_your_real_channel_id"  # <-change me
youtubeApiKey = "AIzaSyDod3x-Rxx21cbQMvuWoput_your_real_api_key"   # <-change me

url = "https://www.googleapis.com/youtube/v3/channels"
params = {
  "id": youtubeChannelId,
  "key": youtubeApiKey,
  "part": "statistics"
}


class Handler(http.server.SimpleHTTPRequestHandler):
    def do_GET(self):
        numberToShow = 0
        subscribers = 0
        views = 0
        response = requests.get(url, params)
        json_data = response.json()
        items = json_data.items()
        for itemKey, itemContent in items:
            if itemKey == 'items':
                firstItem = itemContent[0]
                for itemProp in firstItem:
                    if itemProp == 'statistics':
                        itemStat = firstItem[itemProp]
                        for itemStatAxe in itemStat:
                            if itemStatAxe == 'viewCount':
                                views = itemStat[itemStatAxe]
                            if itemStatAxe == 'subscriberCount':
                                subscribers = itemStat[itemStatAxe]
                                numberToShow = itemStat[itemStatAxe]
        data = {
            "number": numberToShow,
            "subscribers": subscribers,
            "views": views
            }
        self.send_response(HTTPStatus.OK)
        self.send_header('Content-type', 'application/json')
        self.end_headers()
        self.wfile.write(bytes(json.dumps(data), "utf-8"))


# change 80 to an available port if necessary
httpd = socketserver.TCPServer(('', 80), Handler)
print("check it http://localhost:80/")
httpd.serve_forever()
