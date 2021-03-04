const express = require('express');
const app = express();

app.get('/', (req, res) => {
    res.json({number: 12345})
});

app.listen(80);