const conex = require('mysql');

const con = conex.createConnection({
    host: '127.0.0.1',
    port: '3306',
    user: 'root',
    password: '',
    //database: 'caiaipasme';
});
con.query("CREATE DATABASE node_mysql_demo", function (err, result) {
    if (err) throw err;
    console.log("Database Created..!!");
  });
