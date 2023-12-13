//crear una conexión a la bbdd mysql
const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'sql',
    port: 3306
});

//conectar a la bbdd
connection.connect((err) => {
    if (err) {
        console.log('Error connecting to Db');
        return;
    }
    console.log('Connection established');
});

//exportar la conexión para poder usarla en otros archivos
module.exports = connection;