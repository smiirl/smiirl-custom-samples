# tested on python 3.9

import json
import socketserver
from http import HTTPStatus, server

server_adress = "0.0.0.0"
server_port = 8080


class Handler(server.BaseHTTPRequestHandler):
    def do_GET(self):
        data = {
            "number": 54321
            }
        self.send_response(HTTPStatus.OK)
        self.send_header('Content-type', 'application/json')
        self.end_headers()
        self.wfile.write(bytes(json.dumps(data), "utf-8"))


try:
    with socketserver.TCPServer((server_adress, server_port), Handler) as httpd:
        print(f"check it http://{server_adress}:{server_port}/")
        httpd.serve_forever()
except KeyboardInterrupt:
    pass
