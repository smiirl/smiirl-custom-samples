const { Counter } = require("@smiirl/smiirl-library-js");
const express = require('express');

const app = express();

Date.prototype.timeNow = function () {
  return ((this.getHours() < 10) ? "0" : "") + this.getHours() + ((this.getMinutes() < 10) ? "0" : "") + this.getMinutes();
}

app.get('/', (req, res) => {
  var current = new Date();
  var clockNumber = parseInt(current.timeNow());
  res.json(Counter.jsonResponse(clockNumber))
});
const port = 80;
app.listen(port);
;