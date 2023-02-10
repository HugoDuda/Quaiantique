const app = require("express")();
const PORT = process.env.PORT || 3000;

app.listen(PORT, () => {
    console.log(`App up at port ${PORT}`);
});