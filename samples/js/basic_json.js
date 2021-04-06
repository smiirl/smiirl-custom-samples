// Requires an installed npm
// Requires express : npm install express

const express = require('express');
const app = express();

app.get('/', (req, res) => {
    res.json({number: 12345})
});

// change 80 to an available port if necessary
app.listen(80);
// check it http://localhost:80/