var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redisAdapter = require('socket.io-redis')
var redis = new Redis();
var axios = require('axios');

const database = require('./globalmysql');
const query = require('./sqlquery');
const format = require('response-format');
const settings = require('./settings');

var user_socket = [];
var driver_socket = [];
var dispatcher_socket = [];
const env = require('dotenv').config({
    path: '../.env'
});

const socket_port = env.parsed.SOCKET_PORT;
const socket_host = env.parsed.SOCKET_HOST;
settings.kickStartSettings();

console.log(socket_port);

io.adapter(redisAdapter({ host: 'localhost', port: 6379 }));

server.listen(socket_port);

var userNode = io.of('/php/user');

userNode.on('connection', function(socket) {

    socket.on('transfer_msg', function(message) {

        var jsonIobj = message;

        if (jsonIobj.type == "user") {
            if (user_socket["user" + jsonIobj.id]) {
                user_socket["user" + jsonIobj.id].emit(jsonIobj.event, jsonIobj.message);

            }
        }
        if (jsonIobj.type == "driver") {
            if (driver_socket["driver" + jsonIobj.id]) {

                driver_socket["driver" + jsonIobj.id].emit(jsonIobj.event, jsonIobj.message);
            }
        }
    });

});

var web_user = io.of('/user');
web_user.on('connection', function(socket) {
    settings.kickStartSettings();

    console.log("connected");
    socket.on('disconnect', function(message) {
        user_socket["user" + socket.serverId] = '';
        web_user.adapter.clientRooms(socket.id, function(err, rooms) {
            if (rooms != null) {
                web_user.adapter.remoteLeave(socket.id, roomName, function(err) {
                    if (err) { /* unknown id */ }

                });
            }
        });

    });
    // Start connecting by the user
    socket.on('start_connect', function(message) {
        var JsonInObj = JSON.parse(message);
        socket.serverId = JsonInObj.id;
        user_socket["user" + JsonInObj.id] = socket;
    });

});