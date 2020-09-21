const redis = require('socket.io-redis');
var http = require('https');
const database = require('./globalmysql');
const query = require('./sqlquery');
const settings = require('./settings');
const format = require('response-format');

var user_socket = [];
var driver_socket = [];


const env = require('dotenv').config({
    path: '../.env'
});
const privkey = env.parsed.SOCKET_SSL_KEY_PATH;
const fullchain = env.parsed.SOCKET_SSL_CERT_PATH;
const socket_https = env.parsed.SOCKET_HTTPS;
const socket_port = env.parsed.SOCKET_PORT;


if (socket_https == 'yes') {

    console.log("Secure connection");


    fs = require("fs");

    options = {
        key: fs.readFileSync(privkey, 'utf8'),
        cert: fs.readFileSync(fullchain, 'utf8')
    };


    server = require('https').createServer(options);

    io = require('socket.io').listen(server);


    server.listen(socket_port);

} else {

    console.log("Insecure Connection");

    io = require('socket.io')(socket_port);
}


settings.kickStartSettings();

io.adapter(redis({ host: 'localhost', port: 6379 }));

var userNode = io.of('/php/user');

userNode.on('connection', function (socket) {

    socket.on('transfer_msg', function (message) {

        var jsonObj = message;

        if (jsonObj.user_type == "user") {
                
            if (user_socket["user" + jsonObj.id]) {
                user_socket["user" + jsonObj.id].emit(jsonObj.event, jsonObj.message);
            
            }
        }
        if (jsonObj.user_type == "driver") {
            if (driver_socket["driver" + jsonObj.id]) {
                driver_socket["driver" + jsonObj.id].emit(jsonObj.event, jsonObj.message);
            }
        }
        
    });

});

var dispactherNode = io.of('/dispatcher');

dispactherNode.on('connection',function(socket){

socket.on('get_drivers',function(request)
{

database.select(query.dispatcher_get_drivers(request),function(result)
{
    var response = format.success('success',result);

    socket.emit("get_drivers",response);

});

});

});
