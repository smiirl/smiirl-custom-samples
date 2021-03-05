import http.server
import socketserver
import json
from http import HTTPStatus

class Handler(http.server.SimpleHTTPRequestHandler):
    def do_GET(self):
        data = {
            "number": 54321
            }
        self.send_response(HTTPStatus.OK)
        self.send_header('Content-type', 'application/json')
        self.end_headers()
        self.wfile.write(bytes(json.dumps(data), "utf-8"))

# change 80 to an available port if necessary
httpd = socketserver.TCPServer(('', 80), Handler)
httpd.serve_forever()
# check it http://localhost:80/