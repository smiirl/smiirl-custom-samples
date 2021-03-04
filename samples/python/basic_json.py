import http.server
import socketserver
import json
from http import HTTPStatus

class Handler(http.server.SimpleHTTPRequestHandler):
def do_GET(self):
self.send_response(HTTPStatus.OK)
self.send_header('Content-type', 'application/json')
self.end_headers()
self.wfile.write(json.dumps({'number': 54321}))

httpd = socketserver.TCPServer(('', 80), Handler)
httpd.serve_forever()