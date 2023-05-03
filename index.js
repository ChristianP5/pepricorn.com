const express = require("express");
const app = express();
const path = require("path");
const port = 3000;

//set the static folder
app.use(express.static(__dirname + '/public'));
// Route to show the image files
app.get('/images/:filename', (req, res) => {
  const filename = req.params.filename;
  res.sendFile(__dirname + `/public/img/${filename}`);
});


//setting up the ejs
app.set("view engine", "php");

//set the directory path so it can be accessed outside of this project folder
app.set("views", path.join(__dirname, "/views"));

app.get("/", (req, res) => {
  res.render("hero.php");
});

app.get("/item", (req, res) => {
  res.render("item.php");
})

//local host
app.listen(port, () => {
  console.log(`Listening on port ${port}`);
});