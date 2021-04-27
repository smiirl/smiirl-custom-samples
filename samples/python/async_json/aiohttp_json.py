#!/usr/bin/env python3
"""
"""

from aiohttp import web

routes = web.RouteTableDef()


@routes.get("/")
async def simple_number(request: web.Request) -> web.StreamResponse:
    data = {"number": 54321}
    return web.json_response(data)


def init() -> web.Application:
    app = web.Application()
    app.router.add_routes(routes)
    return app


web.run_app(init())
