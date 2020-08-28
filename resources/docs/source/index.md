---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#Car Management-Apis


APIs for car management
<!-- START_7d6cda233d90fef1eaab4f628bfc4749 -->
## Lis Car Makes

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/common/car/makes" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/common/car/makes"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": 1,
            "name": "Acura",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 2,
            "name": "Alfa Romeo",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 3,
            "name": "Aston Martin",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 4,
            "name": "Audi",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 5,
            "name": "BMW",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 6,
            "name": "Bentley",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 7,
            "name": "Buick",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 8,
            "name": "Cadillac",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 9,
            "name": "Chevrolet",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 10,
            "name": "Chrysler",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 11,
            "name": "Dodge",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 12,
            "name": "FIAT",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 13,
            "name": "Ferrari",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 14,
            "name": "Fisker",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 15,
            "name": "Ford",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 16,
            "name": "GMC",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 17,
            "name": "HUMMER",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 18,
            "name": "Honda",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 19,
            "name": "Hyundai",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 20,
            "name": "INFINITI",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 21,
            "name": "Isuzu",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 22,
            "name": "Jaguar",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 23,
            "name": "Jeep",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 24,
            "name": "Kia",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 25,
            "name": "Land Rover",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 26,
            "name": "Lexus",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 27,
            "name": "Lincoln",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 28,
            "name": "MINI",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 29,
            "name": "Maserati",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 30,
            "name": "Mazda",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 31,
            "name": "Mercedes-Benz",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 32,
            "name": "Mercury",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 33,
            "name": "Mitsubishi",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 34,
            "name": "Nissan",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 35,
            "name": "Oldsmobile",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 36,
            "name": "Plymouth",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 37,
            "name": "Pontiac",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 38,
            "name": "Porsche",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 39,
            "name": "Ram",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 40,
            "name": "Rolls-Royce",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 41,
            "name": "Saab",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 42,
            "name": "Saturn",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 43,
            "name": "Scion",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 44,
            "name": "Subaru",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 45,
            "name": "Suzuki",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 46,
            "name": "Tesla",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 47,
            "name": "Toyota",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 48,
            "name": "Volkswagen",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 49,
            "name": "Volvo",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        },
        {
            "id": 50,
            "name": "smart",
            "active": 1,
            "created_at": "2020-06-18 09:11:27",
            "updated_at": "2020-06-18 09:11:27"
        }
    ]
}
```

### HTTP Request
`GET api/v1/common/car/makes`


<!-- END_7d6cda233d90fef1eaab4f628bfc4749 -->

<!-- START_1165dedb9927da021d2517dbe471205c -->
## List car models by make id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/common/car/models/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/common/car/models/1"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": 1,
            "make_id": 1,
            "name": "CL",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 2,
            "make_id": 1,
            "name": "ILX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 3,
            "make_id": 1,
            "name": "Integra",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 4,
            "make_id": 1,
            "name": "Legend",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 5,
            "make_id": 1,
            "name": "MDX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 6,
            "make_id": 1,
            "name": "NSX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 7,
            "make_id": 1,
            "name": "RDX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 8,
            "make_id": 1,
            "name": "RL",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 9,
            "make_id": 1,
            "name": "RLX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 10,
            "make_id": 1,
            "name": "RSX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 11,
            "make_id": 1,
            "name": "TL",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 12,
            "make_id": 1,
            "name": "TLX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 13,
            "make_id": 1,
            "name": "TSX",
            "active": 1,
            "created_at": "2020-06-18 09:11:26",
            "updated_at": "2020-06-18 09:11:26"
        },
        {
            "id": 799,
            "make_id": 1,
            "name": "test",
            "active": 1,
            "created_at": "2020-06-30 07:49:09",
            "updated_at": "2020-06-30 07:49:09"
        }
    ]
}
```

### HTTP Request
`GET api/v1/common/car/models/{make_id}`


<!-- END_1165dedb9927da021d2517dbe471205c -->

<!-- START_58043a4b0dd29ec632a2824b30a30e86 -->
## Get Car Colors

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/common/car/colors" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/common/car/colors"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": 1,
            "color_code": null,
            "color_name": "Aluminum",
            "active": 1,
            "created_at": "2020-06-29 07:01:27",
            "updated_at": "2020-06-29 07:01:27"
        },
        {
            "id": 2,
            "color_code": null,
            "color_name": "Beige",
            "active": 1,
            "created_at": "2020-06-29 07:01:27",
            "updated_at": "2020-06-29 07:01:27"
        },
        {
            "id": 3,
            "color_code": null,
            "color_name": "Black",
            "active": 1,
            "created_at": "2020-06-29 07:01:27",
            "updated_at": "2020-06-29 07:01:27"
        },
        {
            "id": 4,
            "color_code": null,
            "color_name": "Blue",
            "active": 1,
            "created_at": "2020-06-29 07:01:27",
            "updated_at": "2020-06-29 07:01:27"
        },
        {
            "id": 5,
            "color_code": null,
            "color_name": "Brown",
            "active": 1,
            "created_at": "2020-06-29 07:01:27",
            "updated_at": "2020-06-29 07:01:27"
        }
    ]
}
```

### HTTP Request
`GET api/v1/common/car/colors`


<!-- END_58043a4b0dd29ec632a2824b30a30e86 -->

<!-- START_2e6a13817a15ecd965c8099cdd78ff94 -->
## Faq list

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/common/faq/list" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/common/faq/list"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": "64c25b81-ce83-4431-815e-a8ff604814dd",
            "question": "test",
            "answer": "hi there",
            "created_by": 1,
            "extras": null,
            "is_active": 1,
            "deleted_at": null,
            "created_at": "2020-08-17 12:58:15",
            "updated_at": "2020-08-17 12:58:41"
        },
        {
            "id": "91c62bfb-90be-46f1-837c-5053990937f5",
            "question": "Server issue",
            "answer": "contact admin",
            "created_by": 1,
            "extras": null,
            "is_active": 1,
            "deleted_at": null,
            "created_at": "2020-08-17 11:03:36",
            "updated_at": "2020-08-28 14:36:39"
        },
        {
            "id": "974766db-a088-4630-8770-c7cc9bd61106",
            "question": "Are able to make a request",
            "answer": "No means make feed back",
            "created_by": 1,
            "extras": null,
            "is_active": 1,
            "deleted_at": null,
            "created_at": "2020-08-27 10:24:47",
            "updated_at": "2020-08-28 14:37:51"
        }
    ]
}
```

### HTTP Request
`GET api/v1/common/faq/list`


<!-- END_2e6a13817a15ecd965c8099cdd78ff94 -->

<!-- START_f139839c0a36e7fc2178741aa74a61d7 -->
## Sos list

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/common/sos/list" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/common/sos/list"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": "48f77ce3-9aaa-4aa0-96d8-c2492ff42cab",
            "name": "ambulance ttt",
            "number": "2001 255",
            "created_by": 1,
            "extras": null,
            "is_active": 1,
            "deleted_at": null,
            "created_at": "2020-08-17 10:53:46",
            "updated_at": "2020-08-27 10:41:34"
        }
    ]
}
```

### HTTP Request
`GET api/v1/common/sos/list`


<!-- END_f139839c0a36e7fc2178741aa74a61d7 -->

<!-- START_865128b954ae802970aa0dd67ec398b1 -->
## List Car

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/user/list/car" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/list/car"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "success": false,
    "message": "403 Forbidden",
    "status_code": 403,
    "debug": {
        "line": 1043,
        "file": "\/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
        "class": "Symfony\\Component\\HttpKernel\\Exception\\HttpException",
        "trace": [
            "#0 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/helpers.php(46): Illuminate\\Foundation\\Application->abort(403, '', Array)\n#1 \/home\/webdeveloper\/Public\/html\/production\/carpool\/app\/Http\/Middleware\/RouteNeedsRole.php(36): abort(403)\n#2 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\RouteNeedsRole->handle(Object(Illuminate\\Http\\Request), Object(Closure), Array)\n#3 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php(41): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#4 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#5 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php(59): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#6 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Routing\\Middleware\\ThrottleRequests->handle(Object(Illuminate\\Http\\Request), Object(Closure), 60, '1')\n#7 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#8 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(683): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(658): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#10 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(624): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#11 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(613): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#12 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(170): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#13 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(130): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#14 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/proengsoft\/laravel-jsvalidation\/src\/RemoteValidationMiddleware.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#15 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Proengsoft\\JsValidation\\RemoteValidationMiddleware->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#16 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(58): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#17 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Barryvdh\\Debugbar\\Middleware\\InjectDebugbar->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 \/home\/webdeveloper\/Public\/html\/production\/carpool\/app\/Http\/Middleware\/PjaxMiddleware.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\PjaxMiddleware->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#20 \/home\/webdeveloper\/Public\/html\/production\/carpool\/app\/Http\/Middleware\/Cors.php(7): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#21 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\Cors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#22 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#23 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#24 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#25 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#26 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#27 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#28 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(63): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#29 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#30 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/hyn\/multi-tenant\/src\/Middleware\/EagerIdentification.php(29): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#31 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Hyn\\Tenancy\\Middleware\\EagerIdentification->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#32 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/hyn\/multi-tenant\/src\/Middleware\/HostnameActions.php(75): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#33 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Hyn\\Tenancy\\Middleware\\HostnameActions->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#34 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#35 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(145): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#36 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(110): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#37 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(307): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#38 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(289): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->callLaravelRoute(Object(Illuminate\\Http\\Request))\n#39 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(47): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->makeApiCall(Object(Illuminate\\Http\\Request))\n#40 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(172): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->__invoke(Object(Illuminate\\Routing\\Route), Object(ReflectionClass), Object(ReflectionMethod), Array, Array)\n#41 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(121): Mpociot\\ApiDoc\\Extracting\\Generator->iterateThroughStrategies('responses', Array, Array)\n#42 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(84): Mpociot\\ApiDoc\\Extracting\\Generator->fetchResponses(Object(ReflectionClass), Object(ReflectionMethod), Object(Illuminate\\Routing\\Route), Array, Array)\n#43 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(125): Mpociot\\ApiDoc\\Extracting\\Generator->processRoute(Object(Illuminate\\Routing\\Route), Array)\n#44 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(69): Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->processRoutes(Object(Mpociot\\ApiDoc\\Extracting\\Generator), Array)\n#45 [internal function]: Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->handle(Object(Mpociot\\ApiDoc\\Matching\\RouteMatcher))\n#46 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#47 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php(36): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#48 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#49 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#50 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(590): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#51 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#52 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#53 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#54 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/symfony\/console\/Application.php(1001): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#55 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/symfony\/console\/Application.php(271): Symfony\\Component\\Console\\Application->doRunCommand(Object(Mpociot\\ApiDoc\\Commands\\GenerateDocumentation), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/symfony\/console\/Application.php(147): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#57 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 \/home\/webdeveloper\/Public\/html\/production\/carpool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(131): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 \/home\/webdeveloper\/Public\/html\/production\/carpool\/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 {main}"
        ]
    }
}
```

### HTTP Request
`GET api/v1/user/list/car`


<!-- END_865128b954ae802970aa0dd67ec398b1 -->

<!-- START_2834ea2bb41aa089e77905605cbaf493 -->
## Add Car

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/add/car" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/add/car"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/user/add/car`


<!-- END_2834ea2bb41aa089e77905605cbaf493 -->

<!-- START_382a61ec9db6e645aa52fa5f2d8dd77f -->
## Car Update

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/update/car/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/update/car/1"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/user/update/car/{car}`


<!-- END_382a61ec9db6e645aa52fa5f2d8dd77f -->

<!-- START_c560a6e63c70816388f80c8806311df0 -->
## Delete Car

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/delete/car/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/delete/car/1"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/user/delete/car/{car}`


<!-- END_c560a6e63c70816388f80c8806311df0 -->

#Countries


Get countries
<!-- START_7a483081849344aa9cc1a1ce81ed9c3f -->
## Get all the countries.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/countries" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/countries"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": [
        {
            "id": 98,
            "slug": null,
            "name": "India",
            "iso2": null,
            "iso3": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/countries`


<!-- END_7a483081849344aa9cc1a1ce81ed9c3f -->

#Email-Confirmation


APIs for Email-Confirmation
<!-- START_77e45a4c51c84889ebb319ba3a116978 -->
## Confirm user&#039;s email using the confirmation token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/email/confirm" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"token":"ea","email":"perferendis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/email/confirm"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "ea",
    "email": "perferendis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/email/confirm`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `token` | string |  required  | token of the email
        `email` | string |  required  | email of the user entered
    
<!-- END_77e45a4c51c84889ebb319ba3a116978 -->

<!-- START_8685dad8976b82d13ff3ab36da415842 -->
## Resend user&#039;s email address confirmation email.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/email/resend-confirmation" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"odit"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/email/resend-confirmation"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "odit"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/email/resend-confirmation`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | email of the user entered
    
<!-- END_8685dad8976b82d13ff3ab36da415842 -->

#Password-Reset


APIs for Email-Management
<!-- START_8d38f20195c047b34f8d4e3b932a993e -->
## Send the password reset email to the user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/password/forgot" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"fuga"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/password/forgot"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "fuga"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/password/forgot`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | email of the user entered
    
<!-- END_8d38f20195c047b34f8d4e3b932a993e -->

<!-- START_e136defca3005c2cee725b660f83f3a8 -->
## Validate the password reset token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/password/validate-token" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"token":"earum","email":"provident"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/password/validate-token"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "earum",
    "email": "provident"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/password/validate-token`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `token` | string |  required  | token of the email
        `email` | string |  required  | email of the user entered
    
<!-- END_e136defca3005c2cee725b660f83f3a8 -->

<!-- START_a62f1703e9fba891a3e20ff27854aac0 -->
## Validate the password reset token and update the password.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/password/reset" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/password/reset"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/password/reset`


<!-- END_a62f1703e9fba891a3e20ff27854aac0 -->

#Payment


Payment-Related Apis
<!-- START_fda2d6311fc1b17b94e1b8c1a904bac8 -->
## User-Add Card

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/payment/card/add" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"payment_nonce":"vel","last_number":16,"user_role":"earum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/payment/card/add"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "payment_nonce": "vel",
    "last_number": 16,
    "user_role": "earum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": "33f6a61d-4ddc-47dc-a601-250672dbc405",
            "customer_id": "customer_765_6",
            "merchant_id": "pwc2hd46g93s4zy2",
            "card_token": "79dhmq",
            "last_number": 521,
            "card_type": "VISA",
            "user_id": 6,
            "is_default": 0,
            "user_role": "driver",
            "created_at": "2019-05-06 13:17:40",
            "updated_at": "2019-05-06 13:17:40",
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`POST api/v1/payment/card/add`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `payment_nonce` | string |  required  | Payment nonce fron entered value
        `last_number` | integer |  required  | Last numbers of card i.e cvv
        `user_role` | string |  required  | user role
    
<!-- END_fda2d6311fc1b17b94e1b8c1a904bac8 -->

<!-- START_0eb39eaf02e2c90ac37f8a91d7219ded -->
## List cards

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/payment/card/list" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/payment/card/list"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": "33f6a61d-4ddc-47dc-a601-250672dbc405",
            "customer_id": "customer_765_6",
            "merchant_id": "pwc2hd46g93s4zy2",
            "card_token": "79dhmq",
            "last_number": 521,
            "card_type": "VISA",
            "user_id": 6,
            "is_default": 0,
            "user_role": "driver",
            "created_at": "2019-05-06 13:17:40",
            "updated_at": "2019-05-06 13:17:40",
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/payment/card/list`


<!-- END_0eb39eaf02e2c90ac37f8a91d7219ded -->

<!-- START_a60289582f4878cd515bf4058273c1ca -->
## Make card as default card

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/payment/card/make/default" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/payment/card/make/default"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/payment/card/make/default`


<!-- END_a60289582f4878cd515bf4058273c1ca -->

<!-- START_6baea63b0b93a5a65e15ebb9d7a14cff -->
## Delete Card

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/payment/card/delete/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/payment/card/delete/1"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`DELETE api/v1/payment/card/delete/{card}`


<!-- END_6baea63b0b93a5a65e15ebb9d7a14cff -->

#Profile-Management


APIs for Profile-Management
<!-- START_3da20b53e7ac009a16bd3015dd822453 -->
## Update user password.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/password" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/password"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/user/password`


<!-- END_3da20b53e7ac009a16bd3015dd822453 -->

<!-- START_0dfeb5eebc3d94d959f79f1961830247 -->
## Update user profile.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/profile" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/profile"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/user/profile`


<!-- END_0dfeb5eebc3d94d959f79f1961830247 -->

#Ride-Apis


APIs for Rides
<!-- START_5d6ec1a9d0fc6ed9b9c9b073970a7c79 -->
## Offer a Ride

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/ride/offer" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"pickup_lat":69.147517785,"pickup_lng":2.7,"drop_lat":323.725,"drop_lng":146.13431672,"pickup_address":"esse","drop_address":"qui","date":"beatae","start_time":"praesentium","stops":"porro","frequent_days":"aliquam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/ride/offer"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pickup_lat": 69.147517785,
    "pickup_lng": 2.7,
    "drop_lat": 323.725,
    "drop_lng": 146.13431672,
    "pickup_address": "esse",
    "drop_address": "qui",
    "date": "beatae",
    "start_time": "praesentium",
    "stops": "porro",
    "frequent_days": "aliquam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/user/ride/offer`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `pickup_lat` | float |  required  | pickup_lat of the request
        `pickup_lng` | float |  required  | pickup_lng of the request
        `drop_lat` | float |  required  | drop_lat of the request
        `drop_lng` | float |  required  | drop_lng of the request
        `pickup_address` | string |  required  | pickup_address of the request
        `drop_address` | string |  required  | drop_address of the request
        `date` | date |  required  | date of the request(2020-09-06 00:00:00)
        `start_time` | time |  required  | start_time of the request(00:00:00)
        `stops` | json |  optional  | optional stops of the request
        `frequent_days` | string |  optional  | optional frequent days of the request, param can be comma separated.eg:Monday,Tuesday
    
<!-- END_5d6ec1a9d0fc6ed9b9c9b073970a7c79 -->

<!-- START_c90293b8565f7796a85a80d3880edefc -->
## Find Ride

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/ride/find" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"pickup_lat":500307.49,"pickup_lng":2157317,"drop_lat":286103866.536,"drop_lng":79.52,"pickup_address":"aliquam","drop_address":"eos","date":"vitae","start_time":"labore"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/ride/find"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pickup_lat": 500307.49,
    "pickup_lng": 2157317,
    "drop_lat": 286103866.536,
    "drop_lng": 79.52,
    "pickup_address": "aliquam",
    "drop_address": "eos",
    "date": "vitae",
    "start_time": "labore"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": [
        {
            "id": 22,
            "offerd_place_id": 2,
            "pickup_address": "Coimbatore",
            "drop_address": "Chennai",
            "pickup_lat": 11.0118701,
            "pickup_lng": 76.897194,
            "drop_lat": 13.0480438,
            "drop_lng": 79.928809,
            "price": 700,
            "no_of_seats_occupied": 0,
            "riderInfo": {
                "data": {
                    "id": 3,
                    "name": "dilipdk",
                    "last_name": null,
                    "username": null,
                    "email": "dilip@user.com",
                    "mobile": "8667241567",
                    "profile_picture": null,
                    "active": 1,
                    "email_confirmed": 0,
                    "mobile_confirmed": 1,
                    "last_known_ip": "::1",
                    "last_login_at": "2020-08-28 05:38:07",
                    "created_at": "2020-08-28 05:33:53",
                    "updated_at": "2020-08-28 05:38:07"
                }
            }
        }
    ]
}
```

### HTTP Request
`POST api/v1/user/ride/find`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `pickup_lat` | float |  required  | pickup_lat of the request
        `pickup_lng` | float |  required  | pickup_lng of the request
        `drop_lat` | float |  required  | drop_lat of the request
        `drop_lng` | float |  required  | drop_lng of the request
        `pickup_address` | string |  required  | pickup_address of the request
        `drop_address` | string |  required  | drop_address of the request
        `date` | date |  required  | date of the request(2020-09-06 00:00:00)
        `start_time` | time |  required  | start_time of the request(00:00:00)
    
<!-- END_c90293b8565f7796a85a80d3880edefc -->

#Translation

translation api
<!-- START_4b368e0804ff25627d2cce7693626835 -->
## Translation api

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/translation/get" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/translation/get"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "en": {
            "txt_you_need": "whatever you need, at your house",
            "tx_begin_shop": "begin shopping now",
            "txt_enter_phone": "Please enter phone number",
            "txt_skip_now": "Skip for now",
            "txt_nxt": "Next",
            "txt_enter_code": "Enter the code sent to the",
            "txt_change": "change",
            "txt_codenot_receive": "I did not receive a code",
            "txt_resend_to": "Resend to",
            "txt_resend_code": "resend code",
            "txt_cancel": "Cancel",
            "txt_asap": "as soon as possible",
            "txt_restaurants": "restaurants",
            "txt_personalize": "personalize",
            "txt_hamburgers": "hamburgers",
            "txt_oriental_food": "oriental food",
            "txt_tacos": "tacos",
            "txt_veg": "vegetarian",
            "txt_pizzas": "pizzas",
            "txt_my_home": "my home",
            "txt_search": "Search",
            "txt_my_fav": "My favorites",
            "txt_search_underscore": "search \"__\"",
            "txt_more_promo": "See more promotions",
            "txt_most_recomonded": "Most recommended",
            "txt_less_minutes": "Less than 30 minutes",
            "txt_restore": "restore",
            "txt_organize": "Organize",
            "txt_recomended": "Recommended",
            "txt_most_popular": "Most popular",
            "txt_rating": "Rating",
            "txt_delvery_time": "Delivery time",
            "txt_price": "Prices",
            "txt_pincode": "postal \/ zip code",
            "txt_diet": "diet",
            "txt_vegan": "vegan",
            "txt_gluten_free": "gluten free",
            "txt_delivery_details": "Delivery Details",
            "txt_hrs_loc": "Hours and location",
            "txt_menu": "Menu",
            "txt_salads": "salads",
            "txt_breakfasts": "breakfasts",
            "txt_choose_beverage": "choose your beverage",
            "txt_coca_cola": "coca-cola",
            "txt_bottled_water": "bottled water",
            "txt_iced_water": "iced tea",
            "txt_spl_ins": "Special instructions",
            "txt_write_notes": "Write a note here (ex. no ketchup, extra cheese)",
            "txt_add_order": "Add order",
            "txt_home": "at your house",
            "txt_deliver_door": "Deliver to door",
            "txt_subtotal": "Subtotal\n",
            "txt_delivery": "Delivery Charge",
            "txt_total_order": "Total order",
            "txt_cash": "cash",
            "txt_place_order": "Place order",
            "txt_order_num": "Order 5678",
            "txt_estimated_arrival": "Estimated arrival",
            "txt_order_preparing": "Your order is being prepared",
            "txt_order_process": "Order in process",
            "txt_order_code": "Order #6465C",
            "txt_sub_total": "Subtotal",
            "txt_help": "Help",
            "txt_enroute": "En route to",
            "txt_total_min": "9 minutes",
            "txt_motor_cycle": "MOTORCYCLE",
            "txt_contact": "Contact us if you need further information on billing of your purchases",
            "txt_edt_arrival": "Estimated arrival",
            "txt_order_onway": "Your order is on its way",
            "txt_bacon_burger": "Guacamole Bacon Burger",
            "txt_hello": "Hello!",
            "txt_stairs_right": "It's on the stairs to the right",
            "txt_im_here": "I'm here!",
            "txt_write_msg": "Write your message",
            "txt_almost_here": "Your order is almost here!",
            "order_arriving": "Order arriving",
            "txt_see_receipt": "See receipt",
            "txt_order_receipt": "ORDER RECEIPT",
            "txt_close": "Close",
            "txt_captain_delivery": "How was Juan Manuel's delivery?",
            "txt_rate_exp": "Rate the overall experience",
            "txt_skip": "Skip",
            "txt_add_tip": "Do you want to add a tip for Juan Manuel?",
            "txt_express_satification": "Express your satisfaction",
            "txt_custom_amnt": "Enter a custom amount",
            "txt_food_from": "How was the food from Carl's Jr Morelos?",
            "txt_rate": "Rate the overall experience",
            "txt_add_comments": "Leave additional comments",
            "txt_name": "Carls Jr morelos",
            "txt_not_avail": "Not available at the time",
            "txt_previous": "Previous",
            "txt_prev_orders": "Previous orders",
            "txt_upcoming": "Upcoming",
            "txt_thai_restaurant": "Thai restaurant",
            "txt_view_menu": "View menu",
            "txt_order_completed": "Order completed",
            "txt_order_date": "Jan 4, 2019 11:46 a.m.",
            "txt_chicken_salad": "Small chicken salad",
            "txt_delivered_by": "Delivered by Jose de Jesus",
            "txt_total": "Total: ",
            "txt_re_order": "Reorder",
            "txt_view_bill": "View bill",
            "txt_track": "Track",
            "txt_martha_salas": "Martha Salas",
            "txt_give": "Give $ 60 pesos",
            "txt_fav": "Favourites",
            "txt_payment": "Payment",
            "txt_share_friends": "Share with your friends",
            "txt_make_delivery": "Make deliveries with Hive",
            "txt_settings": "Settings",
            "txt_about": "About Hive",
            "txt_edit_acc": "Edit account",
            "txt_saved_loc": "My SAVED LOCATIONS",
            "txt_address": "zacatecas 109, San Benito, 83190",
            "txt_work": "Work",
            "txt_sign_out": "Sign out",
            "txt_save": "Save",
            "txt_meet_in_parking": "Meet in the vehicle",
            "txt_change_pic": "change photo",
            "txt_last_name": "last name",
            "txt_ph_num": "Phone number",
            "txt_email": "Email",
            "txt_pwd": "password",
            "txt_earn_monoey": "Earn money in your spare time",
            "txt_driver_in": "Drive in Hermosillo",
            "txt_delivery_want": "You can make your delivery how you want to",
            "txt_delivery_bike": "Deliveries by bike",
            "txt_choose_distribute_bike": "Choose this option if you want to distribute by bike",
            "txt_motorcycle_deliveries": "Motorcycle deliveries",
            "txt_choose_distribute_motor": "Choose this option if you want to distribute by motorcycle",
            "txt_car_deliveries": "Deliveries by car",
            "txt_choose_distribute_car": "Choose this option if you want to distribute by car",
            "txt_contact_us": "Get in contact with us",
            "txt_contact_hive": "Contact Hive to request your affiliation, we await your call.",
            "txt_share_code": "Share this special code with your friends to obtain a discount of $60 pesos on your their first order using HIVE",
            "txt_hive_martha": "hive-MARTHA-95598gm",
            "txt_code": "YOUR CODE",
            "txt_code_redeem": "Enter a code to redeem here",
            "txt_apply": "Apply",
            "txt_Give": "Give $ 60 pesos",
            "txt_we_help": "How can we help you",
            "txt_last_order": "Last order",
            "txt_report_prob": "Report Our Problem",
            "txt_help_order": "Help with an order",
            "txt_acc_payment": "Account and payments",
            "txt_hive_guide": "Hive guide",
            "txt_problem_curr_order": "I have a problem with my current order",
            "txt_problem_past_order": "I had a problem with a past order",
            "txt_want_invoice_order": "I want an invoice for this order",
            "txt_problem_order": "Problem with my order",
            "txt_can_track_deliver": "How can I track my delivery",
            "txt_change_products_order": "Change products in my order",
            "txt_want_cancel_order": "I want to cancel my order",
            "txt_order_track_toolong": "My order is taking too long",
            "txt_edit_deliver_loc": "How to edit delivery location",
            "txt_why_order_cancel": "Why was my order canceled?",
            "txt_order_never_arrive": "My order never arrived",
            "txt_req_invoice": "Request invoice",
            "txt_issue_invoice": "To issue your invoice it is necessary that you contact the property directly where you made your purchase",
            "txt_bill_send_email": "The bill was sent to the email address you registered with your Hive account, and you can use as proof to request your invoice.",
            "txt_mail_holder": "MAIL ACCOUNT HOLDER",
            "txt_enter_reg_mail": "Enter the registered mail Hive",
            "txt_dobut": "WHAT IS YOUR DOUBT",
            "txt_att_info": "ATTACH RELEVANT INFORMATION",
            "txt_payments": "Payments",
            "txt_add_ano_pay": "add another form of payment",
            "txt_add_pay": "Add payment",
            "txt_select_card": "Credit or debit card",
            "txt_paypal": "paypal",
            "txt_add_card": "Add card",
            "txt_card_num": "Card number [country]",
            "txt_auto_fill_ph": "auto fill with photo",
            "txt_ex_date": "Expiration date",
            "txt_cvv": "CCV",
            "txt_num_card": "number behind the card",
            "txt_mm_yy": "MM \/ YY",
            "txt_review_fb": "Review us on the App store",
            "txt_fb": "Follow us on facebook",
            "txt_legal": "Legal",
            "txt_terms": "Terms and Conditions",
            "txt_privacy_policy": "Privacy Policy",
            "text_double_tap_exit": "Double tap to exit\n",
            "txt_cart_added": "Items added to cart",
            "txt_cart_update": "Items Updated to cart",
            "txt_updatecart_desc": "The toppings already added.Do you want to update the cart?",
            "txt_dialog_no_gps": "Without GPS",
            "txt_dialog_no_gps_messgae": "It seems that your location service has not started.",
            "txt_dialog_enable_gps": "Enable GPS",
            "txt_search_address": "Search Delivery Address",
            "txt_add_adress": "Add new address",
            "txt_use_currloc": "Use your current location",
            "txt_house": "House",
            "txt_job": "Job",
            "txt_others": "Others",
            "txt_door_delivery": "Door delivery",
            "txt_apatment_no": "Number of Apartment \/ Flat",
            "txt_company_name": "Company name",
            "txt_delivery_ins": "Add delivery instructions",
            "txt_flat_empty": "Apartment number or Flat number should not empty\n",
            "txt_fav_empty": "Favourite Title should not be empty",
            "txt_address_empty": "Address should not be empty",
            "txt_add_delete": "Address deleted successfully",
            "txt_update_cart": "Update Order",
            "txt_item_added": "Items already in a cart.Do you want to delete the previous cart items?",
            "txt_delete_Address": "\nAre you sure to delete the address?",
            "txt_yes": "Yes",
            "txt_no": "No",
            "txt_promo": "Promotions",
            "txt_add_notes": "Add note (extra sauce, no pickles ...)",
            "txt_shipping": "Shipping",
            "txt_need": "whatever you need,",
            "txt_disCount": "Promo Discount Amount",
            "txt_add_promo": "Add promotion code",
            "txt_promo_applied": "Promotion applied",
            "txt_sure_logout": "Are you sure to logout?",
            "txt_Ok": "Ok",
            "txt_register": "Register",
            "txt_Location": "Location",
            "txt_Option": "Option",
            "txt_Title": "Title",
            "txt_Area": "Area",
            "txt_choose_Deliver_loc": "Choose delivery location",
            "txt_choose_Deliver_opt": "Choose delivery option",
            "txt_choose_tit": "Choose title",
            "txt_enter_new_tit": "enter new title",
            "txt_enter_postal_zip": "Enter postal \/ zip code",
            "txt_cur_loc": "Current Location",
            "txt_del_door": "Deliver at the door",
            "txt_meet_park": "Meet in the parking",
            "txt_some_wrg": "Something went wrong",
            "txt_net_not_connect": "Network not connected",
            "txt_enter_valid_otp": "Please enter valid OTP",
            "txt_net_connect": "Connected",
            "txt_try_again": "An unknown error occured. Try again later",
            "txt_for": "Forward to",
            "txt_add_address": "Add Address",
            "txt_edit_address": "Edit Address",
            "txt_select_address": "Select Address",
            "txt_no_address": "No delivery address selected",
            "txt_no_address_msg": "No delivery address selected. Please select delivery address and try again",
            "txt_search_country": "Search country",
            "txt_country_codes": "Country Codes",
            "text_Done": "Done",
            "txt_user_name": "User Name",
            "txt_terms_condition_agree": "I here by agree Terms and Conditions",
            "txt_cut_terms": "Terms and Conditions",
            "txt_signUp": "SignUp",
            "txt_deliver_opt": "Delivery options",
            "txt_Start_Shop": "Start shopping now",
            "txt_food_missmatch": "Food item has mismatched",
            "txt_add_del_address": "Add Your delivery address",
            "txt_are_u_logout": "Are you sure.You want to logout?",
            "txt_try_again_wrong": "Something went wrong. Try again later!",
            "txt_f_name": "First Name",
            "txt_l_name": "Last Name",
            "txt_m_num": "Mobile Number",
            "txt_enter_f_name": "Enter First Name",
            "txt_enter_l_name": "Enter Last Name",
            "txt_enter_m_num": "Enter Mobile Number",
            "txt_enter_Em_num": "Enter Your Email",
            "txt_update": "Update",
            "text_ok": "Okey",
            "txt_order_placed": "Order Placed",
            "txt_what_you_home": "What you need, at home",
            "txt_at_home": "at home",
            "txt_fav_success": "This restaurant added to your favourite list.\n",
            "txt_Choose": "Choose options",
            "text_camera": "Camera",
            "text_galary": "Gallery",
            "txt_add_cart": "Add Order",
            "txt_no_cart": "No cart items found",
            "txt_delete_cart_item": "Are you sure you want to remove the tem from cart",
            "txt_continue_trip": "Continue Trip",
            "txt_rate_order": "How do you rate",
            "txt_profits": "Profits",
            "txt_profile": "My Profile",
            "txt_car": "Car",
            "txt_documents": "Documents",
            "txt_acct_pay": "Account and Payments",
            "txt_rep_fail": "Report Failures",
            "txt_edt_info": "Edit Info",
            "txt_invite_frd": "Invite a friend",
            "txt_abt_hive": "About Hive",
            "txt_lang": "Languages",
            "txt_where_from": "Where are you from",
            "txt_onmy_way": "On my way to",
            "txt_deliver": "Deliver",
            "txt_complete": "Complete Trip",
            "txt_surf": "Surf",
            "txt_online": "Online",
            "txt_offline": "Offline",
            "txt_arriving": "Order Arriving",
            "txt_parking": "* Park in the parking lot on the left side and touch",
            "txt_order_arriving": "Your order is being arriving",
            "txt_food": "Food",
            "txt_basic_points": "Basic points",
            "txt_email_invalid": "Enter valid email",
            "txt_see_earnings": "Where can i see my earnings",
            "txt_whr_recharge": "Where can i recharge",
            "txt_update_info": "How to update information",
            "txt_rec_topics": "Recommended Topics",
            "txt_imp_del": "\nImportant basic points for make deliveries",
            "txt_all_themes": "All the themes",
            "txt_send_code": "Send the code and get travel gift. When your referral register your code, you and your referral will receive 50 trips gift.",
            "txt_share_promo_code": "Share Code",
            "txt_invite_frnd": "Invite a friend on hive\n",
            "txt_referal": "With the referral program invite and receive Benefits.",
            "txt_share_your_code": "Share your code\r",
            "txt_share_refferal": "\r\nInvite a friend as a referral with your code",
            "txt_ref_frnd": "Refer a friend",
            "txt_frnd_reg": "\r\nYour friend registers your code",
            "txt_frnd_reg_code": "\r\nYour friend must register your code in the app",
            "txt_enjoy_benifits": "Enjoy your benefits\r",
            "txt_reg_sucess": "\r\nOnce you are registered, you and your friend receive\r\nthe benefits.",
            "txt_Code": "YOUR CODE",
            "txt_terms_condition": "Terms and Conditions",
            "txt_share": "Share code",
            "txt_how_to_help": "\r\nHow can we help you?",
            "txt_wallet": "Wallet ",
            "txt_ref": "Refferal",
            "txt_delivery_of": "How was the delivery of ",
            "txt_meses": "Months",
            "txt_viajes": "Travels",
            "txt_complaint_reg": "Complaint Registered",
            "txt_alert": "Alert",
            "txt_redeem_valid": "Redeem Code is Empty",
            "txt_wallet_bal": "Total Wallet Balance",
            "txt_minus_bal": "Total Minus Balance",
            "txt_rating_hand_valid": "Please Select the Rating ",
            "text_wallethistory_empty": "Wallet History Not Found",
            "txt_login_alert_deliveryman": "Invalid Login",
            "txt_login_alert_user": "Invalid Login",
            "txt_compl": "Complaint",
            "txt_submit": "submit",
            "txt_close_res": "Restaurant Closed . Please choose another restaurant!",
            "txt_item_available": "Item Unavailable",
            "txt_item_Unavailable_selected": "Item Unavailable.Please choose other Food item",
            "txt_decline_p1": "If take few minutes for your request approval.",
            "txt_decline_p2": "Please contact admin.",
            "txt_call_admin": "Call Admin",
            "text_title_restra": "RESTAURANTS",
            "txt_menu_cata_unavailable": "Menu Items unavailable",
            "txt_tax": "Tax",
            "txt_cancel_title": "Are you sure to cancel the order?",
            "txt_order_cancel": "Order Cancelled",
            "txt_add_tips_delier": "Do you want to add a tip for ",
            "txt_food_from_deliver": "How was the food from ",
            "txt_choose_lng": "Choose Language",
            "txt_english": "English",
            "txt_spanish": "Spanish",
            "txt_no_rest_found": "No Restaurants found",
            "txt_no_address_found": "No Address Found",
            "txt_enter_user": "Enter user name",
            "txt_enter_email": "Enter email",
            "txt_wallet_his": "Wallet History",
            "txt_order_list": "Order list",
            "txt_search_categories": "Search categories",
            "txt_already_itemsAdd_inCart": "Items already in cart",
            "txt_already_itemsAdd": "Your cart contains items from a different restaurant. Would you like to reset your cart before browsing this restaurant?",
            "txt_accept_terms": "Accept Terms and Conditions to continue",
            "txt_history": "History",
            "txt_Add_Languages": "Add Languages",
            "txt_enter_address": "Enter Address",
            "txt_order_picked": "Order Picked",
            "txt_rate_friend": "Rate Your friend",
            "txt_rate_overall_exp": "Rate the overall experience",
            "txt_continue": "Continue",
            "txt_decline": "Decline",
            "txt_enter_phone_number": "Enter phone number",
            "txt_package_amount": "Package Amount",
            "txt_offer_discount": "Offer Discount Amount",
            "txt_accept": "Accept"
        },
        "es": {
            "txt_you_need": "Lo que necesites, en tu casa",
            "tx_begin_shop": "Comienza a comprar ya",
            "txt_enter_phone": "Por favor, introduzca el número de teléfono",
            "txt_skip_now": "Saltar por el momento",
            "txt_nxt": "siguiente",
            "txt_enter_code": "Ingresa el codigo enviado al",
            "txt_change": "cambiar",
            "txt_codenot_receive": "No recibí código",
            "txt_resend_to": "Reenviar al",
            "txt_resend_code": "reenviar codigo",
            "txt_cancel": "Cancelar",
            "txt_asap": "lo antes posible",
            "txt_restaurants": "restaurantes",
            "txt_personalize": "personalizar",
            "txt_hamburgers": "hamburguesas",
            "txt_oriental_food": "comida oriental",
            "txt_tacos": "tacos",
            "txt_veg": "vegetariana",
            "txt_pizzas": "pizzas",
            "txt_my_home": "mi casa",
            "txt_search": "Buscar",
            "txt_my_fav": "Mis favoritos",
            "txt_search_underscore": "buscar \"__\"",
            "txt_more_promo": "ver mas promociones",
            "txt_most_recomonded": "Los más recomendados",
            "txt_less_minutes": "Menos de 30 minutos",
            "txt_restore": "restablecer",
            "txt_organize": "Organizar",
            "txt_recomended": "Recomendada",
            "txt_most_popular": "Mas popular",
            "txt_rating": "Calificacion",
            "txt_delvery_time": "Tiempo de entrega",
            "txt_price": "Precios",
            "txt_pincode": "postal \/ código postal",
            "txt_diet": "dieta",
            "txt_vegan": "vegana",
            "txt_gluten_free": "sin gluten",
            "txt_delivery_details": "Detalles para entrega",
            "txt_hrs_loc": "Horario y ubicación",
            "txt_menu": "Menu",
            "txt_salads": "ensaladas",
            "txt_breakfasts": "desayunos",
            "txt_choose_beverage": "Elige tu bebida",
            "txt_coca_cola": "coca-cola",
            "txt_bottled_water": "agua embotellada",
            "txt_iced_water": "te helado",
            "txt_spl_ins": "Instrucciones especiales",
            "txt_write_notes": "Escribe aqui una nota (ej. Sin catsup, extra queso)",
            "txt_add_order": "Agregar orden",
            "txt_home": "en tu casa",
            "txt_deliver_door": "Entregar en la puerta",
            "txt_subtotal": "Subtotal",
            "txt_delivery": "Gastos de envío",
            "txt_total_order": "Total orden",
            "txt_cash": "efectivo",
            "txt_place_order": "Realizar pedido",
            "txt_order_num": "Pedido 5678",
            "txt_estimated_arrival": "llegada estimada",
            "txt_order_preparing": "Tu pedido se está preparando",
            "txt_order_process": "Pedido en proceso",
            "txt_order_code": "Pedido #6465C",
            "txt_sub_total": "Subtotal",
            "txt_help": "Ayuda",
            "txt_enroute": "En camino a",
            "txt_total_min": "9 minutos",
            "txt_motor_cycle": "MOTONETA",
            "txt_contact": "Contáctanos si necesitas información adicional sobre la facturación de tus compras",
            "txt_edt_arrival": "Llegada estimada",
            "txt_order_onway": "Tu pedido está en camino",
            "txt_bacon_burger": "Hamburguesa Guacamole Bacon",
            "txt_hello": "Hola!",
            "txt_stairs_right": "Es en las escaleras a la derecha",
            "txt_im_here": "Voy llegando!",
            "txt_write_msg": "Escribe tu mensaje",
            "txt_almost_here": "Tu pedido está llegando!",
            "order_arriving": "Pedido llegando",
            "txt_see_receipt": "Ver recibo",
            "txt_order_receipt": "RECIBO DEL PEDIDO",
            "txt_close": "Cerrar",
            "txt_captain_delivery": "Como estuvo la entrega de Juan Manuel?",
            "txt_rate_exp": "Valorar la experiencia en general",
            "txt_skip": "Omitir",
            "txt_add_tip": "Quieres agregar un extra para Juan Manuel?",
            "txt_express_satification": "Expresa tu satisfacción",
            "txt_custom_amnt": "Ingresa un monto personalizado",
            "txt_food_from": "Como estuvo la comida de Carl’s Jr Morelos?",
            "txt_rate": "Califica la experiencia en general",
            "txt_add_comments": "Dejar comentarios adicionales",
            "txt_name": "Carls Jr morelos",
            "txt_not_avail": "No disponibles al momento",
            "txt_previous": "Anteriores",
            "txt_prev_orders": "Pedidos anteriores",
            "txt_upcoming": "Próximos",
            "txt_thai_restaurant": "Restaurant Thai",
            "txt_view_menu": "Ver menú",
            "txt_order_completed": "Pedido completado",
            "txt_order_date": "4 ene 2019 11:46am",
            "txt_chicken_salad": "ensalada chica de pollo",
            "txt_delivered_by": "Entregada por Jose de Jesus",
            "txt_total": "Total: ",
            "txt_re_order": "Volver a ordenar",
            "txt_view_bill": "Ver recibo",
            "txt_track": "Rastrear",
            "txt_martha_salas": "Martha Salas",
            "txt_give": "Regala $60 pesos",
            "txt_fav": "Favoritos",
            "txt_payment": "Pago",
            "txt_share_friends": "Comparte con tus amigos",
            "txt_make_delivery": "Haz entregas con Hive",
            "txt_settings": "configuración",
            "txt_about": "Sobre Hive",
            "txt_edit_acc": "Editar cuenta",
            "txt_saved_loc": "mis ubicaciones guardadas",
            "txt_address": "zacatecas 109, San Benito, 83190",
            "txt_work": "trabajo",
            "txt_sign_out": "cerrar sesión",
            "txt_save": "Guardar",
            "txt_meet_in_parking": "Reunirse en el vehiculo",
            "txt_change_pic": "cambiar foto",
            "txt_last_name": "apellido",
            "txt_ph_num": "numero de telefono",
            "txt_email": "correo electronico",
            "txt_pwd": "contraseña",
            "txt_earn_monoey": "Gana dinero en tu tiempo libre",
            "txt_driver_in": "Conduce en Hermosillo",
            "txt_delivery_want": "Puedes hacer entregas como tu gustes",
            "txt_delivery_bike": "Entregas en bici",
            "txt_choose_distribute_bike": "Elige esta opción si deseas repartir en bici",
            "txt_motorcycle_deliveries": "Entregas en moto",
            "txt_choose_distribute_motor": "Elige esta opción si deseas repartir en moto",
            "txt_car_deliveries": "Entregas en auto",
            "txt_choose_distribute_car": "Elige esta opción si deseas repartir en auto",
            "txt_contact_us": "Ponte en contacto con nosotros",
            "txt_contact_hive": "Comunícate con Hive para solicitar tu afiliación, esperamos tu llamada.",
            "txt_share_code": "Comparte este código especial con tus amigos para que cuando usen HIVE por primera vez obtengan un descuento de $60 pesos en su primer pedido",
            "txt_hive_martha": "hive-MARTHA-95598gm",
            "txt_code": "TU CÓDIGO",
            "txt_code_redeem": "Ingresa aqui un codigo para canjear",
            "txt_apply": "Applicar",
            "txt_Give": "Regala $60 pesos",
            "txt_we_help": "Como podemos ayudarte",
            "txt_last_order": "Ultimo pedido",
            "txt_report_prob": "Informe nuestro problema",
            "txt_help_order": "Ayuda con un pedido",
            "txt_acc_payment": "Cuenta y pagos",
            "txt_hive_guide": "Guia de hive",
            "txt_problem_curr_order": "Tengo un problema con mi pedido actual",
            "txt_problem_past_order": "Tuve un problema con un pedido",
            "txt_want_invoice_order": "Quiero facturar este pedido",
            "txt_problem_order": "Problema con mi pedido",
            "txt_can_track_deliver": "Como puedo rastrear mi entrega",
            "txt_change_products_order": "Cambair articulos de mi pedido",
            "txt_want_cancel_order": "Quiero cancelar mi pedido",
            "txt_order_track_toolong": "Mi pedido esta demorando mucho",
            "txt_edit_deliver_loc": "Como editar ubicacion de entrega",
            "txt_why_order_cancel": "Porque se cancelo mi pedido?",
            "txt_order_never_arrive": "mi pedido nunca llego",
            "txt_req_invoice": "facturar",
            "txt_issue_invoice": "Para la emisión de tu factura es necesario que contactes directamente al establecimiento donde hiciste tu compra",
            "txt_bill_send_email": "El recibo llegara al correo electrónico que tienes registrado en tu cuenta Hive, y lo puedes usar como comprobante para solicitar tu factura.",
            "txt_mail_holder": "CORREO DEL TITULAR DE LA CUENTA",
            "txt_enter_reg_mail": "Ingresa el correo registrado en Hive",
            "txt_dobut": "CUAL ES TU DUDA",
            "txt_att_info": "ADJUNTA INFORMACIÓN RELEVANTE",
            "txt_payments": "Pagos",
            "txt_add_ano_pay": "agregar otra forma de pago",
            "txt_add_pay": "agregar pago",
            "txt_select_card": "tarjeta de crédito o debito",
            "txt_paypal": "paypal",
            "txt_add_card": "agregar tarjeta",
            "txt_card_num": "Numero de tarjeta [país]",
            "txt_auto_fill_ph": "auto llenar con foto",
            "txt_ex_date": "fecha de vencimiento",
            "txt_cvv": "ccv",
            "txt_num_card": "numero detras de la tarjeta",
            "txt_mm_yy": "MM\/AA",
            "txt_review_fb": "calificanos en App store",
            "txt_fb": "siguenos en facebook",
            "txt_legal": "Legal",
            "txt_terms": "Terminos y condiciones",
            "txt_privacy_policy": "Politica de privacidad",
            "text_double_tap_exit": "Doble toque para salir",
            "txt_cart_added": "Artículos añadidos al carrito",
            "txt_cart_update": "Actualizado artículos a la cesta",
            "txt_dialog_no_gps": "sin GPS",
            "txt_dialog_no_gps_messgae": "Parece que su servicio de localización no ha comenzado.",
            "txt_dialog_enable_gps": "activar el GPS",
            "txt_search_address": "Búsqueda Dirección de entrega",
            "txt_add_adress": "agregar nueva dirección",
            "txt_use_currloc": "Utilice su ubicación actual",
            "txt_house": "Casa",
            "txt_job": "Trabajo",
            "txt_others": "Otros",
            "txt_door_delivery": "Entrega a puerta",
            "txt_apatment_no": "Numero de apartmento\/ Piso",
            "txt_company_name": "Nombre de la empresa",
            "txt_delivery_ins": "Agregar instrucciones de entrega",
            "txt_flat_empty": "número de apartamento o número plana no deben vaciar",
            "txt_fav_empty": "Favorito al título no debe estar vacía",
            "txt_address_empty": "Dirección no debe estar vacía",
            "txt_add_delete": "Dirección eliminado correctamente",
            "txt_update_cart": "Orden de actualización",
            "txt_item_added": "Los productos que ya están en un cart.Do que desea eliminar los elementos carrito anteriores?",
            "txt_delete_Address": "Está seguro que desea borrar la dirección?",
            "txt_yes": "si",
            "txt_no": "No",
            "txt_promo": "Promociones",
            "txt_add_notes": "Aggregar nota(extra salsa,sin pepinillos...)",
            "txt_shipping": "Envio",
            "txt_need": "lo que sea que necesites,",
            "txt_disCount": "Promoción Cantidad de Descuento",
            "txt_add_promo": "Agregar codigo de promocion",
            "txt_promo_applied": "Promocion aplicada",
            "txt_sure_logout": "¿Está seguro de cerrar la sesión?",
            "txt_Ok": "Okay",
            "txt_register": "Registrarse",
            "txt_Location": "Ubicación",
            "txt_Option": "Opción",
            "txt_Title": "Título",
            "txt_Area": "Zona",
            "txt_choose_Deliver_loc": "Elija la ubicación de entrega",
            "txt_choose_Deliver_opt": "Elija la opción de envío",
            "txt_choose_tit": "Elija título",
            "txt_enter_new_tit": "introducir un nuevo título",
            "txt_enter_postal_zip": "Introducir código \/ postal postal",
            "txt_cur_loc": "Ubicación actual",
            "txt_del_door": "Entregar a la puerta",
            "txt_meet_park": "Se reúnen en el aparcamiento",
            "txt_some_wrg": "Algo salió mal",
            "txt_net_not_connect": "La red no está conectado",
            "txt_enter_valid_otp": "Por favor, introduzca OTP válida",
            "txt_net_connect": "Conectado",
            "txt_try_again": "Un error desconocido ocurrió. Inténtelo más tarde",
            "txt_for": "con interés",
            "txt_add_address": "Añadir dirección",
            "txt_edit_address": "Editar dirección",
            "txt_select_address": "Seleccionar dirección",
            "txt_no_address": "Ninguna dirección de entrega seleccionada",
            "txt_no_address_msg": "No se seleccionó la dirección de entrega. Seleccione la dirección de entrega e intente nuevamente",
            "txt_search_country": "Buscar país",
            "txt_country_codes": "Códigos de país",
            "text_Done": "Hecho",
            "txt_user_name": "Nombre de usuario",
            "txt_terms_condition_agree": "Yo aquí de acuerdo con Términos y Condiciones",
            "txt_cut_terms": "Términos y Condiciones",
            "txt_signUp": "Regístrate",
            "txt_deliver_opt": "Opciones de entrega",
            "txt_Start_Shop": "Comienza a comprar ya",
            "txt_food_missmatch": "alimento ha cargado no coincide",
            "txt_add_del_address": "Agregar su dirección de entrega",
            "txt_are_u_logout": "¿Está sure.You quieres salir?",
            "txt_try_again_wrong": "Algo salió mal. Inténtelo de nuevo más tarde!",
            "txt_f_name": "Nombre de pila",
            "txt_l_name": "Apellido",
            "txt_m_num": "Número de teléfono móvil",
            "txt_enter_f_name": "Introduzca el nombre",
            "txt_enter_l_name": "Introduzca el apellido",
            "txt_enter_m_num": "Introducir número de móvil",
            "txt_enter_Em_num": "Introduce tu correo electrónico",
            "txt_update": "Actualizar",
            "text_ok": "Bueno",
            "txt_order_placed": "Pedido realizado",
            "txt_what_you_home": "Lo que se necesita, como en casa",
            "txt_at_home": "en casa",
            "txt_fav_success": "Este restaurante se agregó a tu lista de favoritos.",
            "txt_Choose": "Elige opciones",
            "text_camera": "Cámara",
            "text_galary": "Galería",
            "txt_add_cart": "Añadir Solicitar",
            "txt_no_cart": "No hay elementos que se encuentran carrito",
            "txt_delete_cart_item": "¿Seguro que desea eliminar el tem del carrito",
            "txt_continue_trip": "continuar viaje",
            "txt_rate_order": "continuar viaje",
            "txt_profits": "Ganancias",
            "txt_profile": "Mi perfil",
            "txt_car": "Automóvil",
            "txt_documents": "Documentos",
            "txt_acct_pay": "Cuenta Y Pagos",
            "txt_rep_fail": "Reporta fallas",
            "txt_edt_info": "Editar info",
            "txt_invite_frd": "Invita un amigo",
            "txt_abt_hive": "Sobre Hive",
            "txt_lang": "Lenguajes",
            "txt_where_from": "De donde eres",
            "txt_onmy_way": "En camino a",
            "txt_deliver": "Entregar a",
            "txt_complete": "Completar viaje",
            "txt_surf": "Navegar",
            "txt_online": "En línea",
            "txt_offline": "Desconectado",
            "txt_arriving": "pedido ilegando",
            "txt_parking": "*Estacionar en el estacionamiento de lado izquierdo y tocar",
            "txt_order_arriving": "\r\nTu pedido está llegando",
            "txt_food": "Comida",
            "txt_basic_points": "Puntos basicos",
            "txt_email_invalid": "Ingrese un email valido",
            "txt_see_earnings": "Donde puedo ver mis ganancias",
            "txt_whr_recharge": "Donde puedo recargar",
            "txt_update_info": "Como actualizar información",
            "txt_rec_topics": "Temas recomendados",
            "txt_imp_del": "Puntos básicos importantes para realizar entregas",
            "txt_all_themes": "Todos los temas",
            "txt_send_code": "Envía el código y obten viajes de regalo. Cuando tu referido registre tu código, tu y tu referido recibirán 50 viajes de regalo.",
            "txt_share_promo_code": "Comparte codigo",
            "txt_invite_frnd": "Invite a un amigo on hive",
            "txt_referal": "Con el programa de referidos invita y recibe\r\nbeneficios. ",
            "txt_share_your_code": "Comparte tu codigo",
            "txt_share_refferal": "Invita a un amigo como referido con tu codigo",
            "txt_ref_frnd": "Refiere a un amigo",
            "txt_frnd_reg": "Tu amigo registra tu codigo",
            "txt_frnd_reg_code": "Tu amigo debe registrar tu codigo en la app",
            "txt_enjoy_benifits": "Disfruta tus beneficios",
            "txt_reg_sucess": "Una ves registrado, tu y tu amigo reciben \r\nlos beneficios.",
            "txt_Code": "TU CÓDIGO",
            "txt_terms_condition": "Términos y condiciones",
            "txt_share": "Comparte codigo",
            "txt_how_to_help": "¿Como podemos ayudarte?",
            "txt_wallet": "Billetera",
            "txt_ref": "Referencia",
            "txt_delivery_of": "Como estuvo la entrega de",
            "txt_meses": "Meses",
            "txt_viajes": "Viajes",
            "txt_complaint_reg": "Queja Registrada",
            "txt_alert": "Alerta",
            "txt_redeem_valid": "Canjear código es vacía",
            "txt_wallet_bal": "Total Saldo Monedero",
            "txt_minus_bal": "Total menos el saldo",
            "txt_rating_hand_valid": "Por favor seleccionar la clasificación",
            "text_wallethistory_empty": "Historia cartera no encontrada",
            "txt_login_alert_deliveryman": "Ingreso invalido",
            "txt_login_alert_user": "Ingreso invalido",
            "txt_compl": "Queja",
            "txt_submit": "enviar",
            "txt_close_res": "Restaurante cerrado. Por favor seleccione otro restaurante!",
            "txt_item_available": "elemento no disponible",
            "txt_item_Unavailable_selected": "Artículo Unavailable.Please elegir otro alimento",
            "txt_decline_p1": "Si toma unos minutos para su aprobación petición.",
            "txt_decline_p2": "Por favor contacto administrativo.",
            "txt_call_admin": "llamada de administración",
            "text_title_restra": "RESTAURANTES",
            "txt_menu_cata_unavailable": "Elementos de menú disponible",
            "txt_tax": "Impuesto",
            "txt_cancel_title": "¿Estás seguro de cancelar el pedido?",
            "txt_order_cancel": "Orden cancelada",
            "txt_add_tips_delier": "Quieres agregar un extra para ",
            "txt_food_from_deliver": "Como estuvo la comida de ",
            "txt_choose_lng": "Elige lengua",
            "txt_english": "Inglés",
            "txt_spanish": "Español",
            "txt_no_rest_found": "No se encontraron restaurantes",
            "txt_no_address_found": "No se encontró dirección",
            "txt_enter_user": "Introduzca su nombre de usuario",
            "txt_enter_email": "Ingrese correo electrónico",
            "txt_wallet_his": "Historial de billetera",
            "txt_order_list": "Lista de orden",
            "txt_search_categories": "Buscar categorías",
            "txt_accept_terms": "Debe aceptar los términos y condiciones para continuar",
            "txt_history": "Historia",
            "txt_Add_Languages": "Añadir Idiomas",
            "txt_enter_address": "Ingresa la direccion",
            "txt_order_picked": "Solicitar escogida",
            "txt_rate_friend": "Califique su amigo",
            "txt_rate_overall_exp": "Valorar la experiencia en general",
            "txt_continue": "Seguir",
            "txt_decline": "Disminución",
            "txt_enter_phone_number": "Introduzca el número de teléfono",
            "txt_package_amount": "paquete Cantidad",
            "txt_offer_discount": "Ofrecer Cantidad de Descuento",
            "txt_accept": "Aceptar"
        }
    }
}
```

### HTTP Request
`GET api/v1/translation/get`


<!-- END_4b368e0804ff25627d2cce7693626835 -->

#User-Login


<!-- START_e345751f8a6c511d70446cfed908739f -->
## Send the OTP for user login.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/login/send-otp" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"mobile":"libero"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/login/send-otp"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile": "libero"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "uuid": "54e4ebe54er5e45re5ber54r5r5rr"
}
```

### HTTP Request
`POST api/v1/user/login/send-otp`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `mobile` | string |  required  | mobile of the user entered
    
<!-- END_e345751f8a6c511d70446cfed908739f -->

<!-- START_7a184547882598fc164c10be7745584b -->
## Login user and respond with access token and refresh token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/login" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"aspernatur","mobile":"consequatur","password":"consequuntur"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/login"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "aspernatur",
    "mobile": "consequatur",
    "password": "consequuntur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token_type": "Bearer",
    "expires_in": 1296000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM4ZTE2N2YyNzlkM2UzZWEzODM5ZGNlMmY4YjdiNDQxYjMwZDQ0YmVlYjAzOWNmZjMzMmE2ZTc0ZDY1MDRiNmE3NjhhZWQzYWU5ZjE5MGUwIn0.eyJhdWQiOiIyIiwianRpIjoiMzhlMTY3ZjI3OWQzZTNlYTM4MzlkY2UyZjhiN2I0NDFiMzBkNDRiZWViMDM5Y2ZmMzMyYTZlNzRkNjUwNGI2YTc2",
    "refresh_token": "def5020045b028faaca5890136e3a8d7c850fb6b95cf2f78698b2356e544ee567cef1efa4099eaea3e3738ba11c9baabb1188a3d49de316e4451f32cdaa6017ebb9ff748fdf43d84b4e796a0456c4125ebaeca7930491fe315e4b86adf787999250966"
}
```

### HTTP Request
`POST api/v1/user/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  optional  | optional email of the user entered
        `mobile` | string |  optional  | optional mobile of the user entered
        `password` | string |  required  | password of the user entered
    
<!-- END_7a184547882598fc164c10be7745584b -->

<!-- START_356aa57a5886f377e4e6eea0dad27149 -->
## Login Admin user and respond with access token and refresh token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/admin/login" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/login"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token_type": "Bearer",
    "expires_in": 1296000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM4ZTE2N2YyNzlkM2UzZWEzODM5ZGNlMmY4YjdiNDQxYjMwZDQ0YmVlYjAzOWNmZjMzMmE2ZTc0ZDY1MDRiNmE3NjhhZWQzYWU5ZjE5MGUwIn0.eyJhdWQiOiIyIiwiacaP8zkCWTpzh8ZtWBUYVrPkYRWbwz-L5x6dx2d901Aq_7-LwlzPMtP0N93kVfFuLwK2RCzlVtcCTxZaUW9S7x3Y",
    "refresh_token": "def5020045b028faaca5890136e3a8d7c850fb6b95cf2f78698b2356e544ee567cef1efa4099eaea3e3738ba11c9baabb1188a3d49de316e4451f32cdaa6017ebb9ff748fdf43d84b4e796a0456c4125ebaeca7930491fe315e4b86adf7879992509667dd68eacc488bddb2cc005357cdab1da5f0582659eef11e06bf2447c1209f6c17c83453cd6fa6dd6d5d98ff7129a6d3f3509c6c99fba379ea4aee85c0eb89b5f648682484452219d1c592d80c3165657a519f790ba19ad347774c0a199"
}
```

### HTTP Request
`POST api/v1/admin/login`


<!-- END_356aa57a5886f377e4e6eea0dad27149 -->

<!-- START_fb2ae43e2e99ff4e90f22ba03801a735 -->
## Logout the user based on their access token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/logout" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/logout"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/logout`


<!-- END_fb2ae43e2e99ff4e90f22ba03801a735 -->

#User-Management


APIs for User-Management
<!-- START_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->
## Get the current logged in user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/user" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`GET api/v1/user`


<!-- END_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->

<!-- START_7fef01e7235c89049ebe3685de4bff17 -->
## Register the user and send welcome email.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/register" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"pariatur","last_name":"nostrum","gender":"nemo","city":"impedit","uuid":"culpa","email":"exercitationem","password":"odio","device_token":"cum","login_by":"reiciendis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/register"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "pariatur",
    "last_name": "nostrum",
    "gender": "nemo",
    "city": "impedit",
    "uuid": "culpa",
    "email": "exercitationem",
    "password": "odio",
    "device_token": "cum",
    "login_by": "reiciendis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "expires_in": 31622400,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcxNWQ4Yjg5ZjI1ZDVhYzRkNDM0NTYzY2VhNjJmM2Y1ZmYwMDU4YjkwZmJiMGM0YzgxOTliYjkwMWY2Y2NlNjhjMjgyMzNhYWYyOTNhMDQzIn0.eyJhdWQiOiIxIiwianRpIjoiNzE1ZDhiODlmMjVkNWFjNGQ0MzQ1NjNjZWE2MmYzZjVmZjAwNThiOTBmYmIwYzRjODE5OWJiOTAxZjZjY2U2OGMyODIzM2FhZjI5M2EwNDMiLCJpYXQiOjE1ODA5MDI0NDAsIm5iZiI6MTU4MDkwMjQ0MCwiZXhwIjoxNjEyNTI0ODQwLCJzdWIiOiIxMiIsInNjb3BlcyI6W119.jMHG7WfU57-lcPhX0gtFcLbaG_WU1VmAcuw8DDJ_6KRMJJ5LzLtAqcqyZbr8-LaSUO10bfupQYUcYLIMZ3fyB1c99IBOUzoksqbirj7CNZYvv8H5-dbuTlsqXd9e8kjRRFG9tBqmnQ1Bkv0Ctf5rYtbzUBKNc1r7eoHdD715QkEcpVYClkX6McltFGjwuRy-EXutj2eDLQWlSpl-ACa4LxZF41Lv6hHbZd5i6vosNyisWwTuoMsiykikfZyHA8S37F_8XSGafNQVFgUWsef1TDeAFrOSQz12WzguBIpgoXl16e1PwZlseEEW6-sn42ulHjT8aF-vfo_P3K3pVu_XWN3UN0_BgJipVR3rtB0Zi84465r8dTODSKSdQJlMXhZ9CIpWE-gPBZpAknPe9_Zltdp0QZ3qiTA0Mk_LvD2chr6bD37fJDGneFJOasZzMe01aP6JyIt1xlyz-DWzwBnQ2PsO35zDVFd8CHE8uK_S8htJT0j0veqj4eXAAFN_mbMVd0u1tBoxyLxxFlqW2u7IUyvSMiJi-heXH-fACqFfZjGt9iyrAS6_KSuKH-cz8H-oYRT8GF3y9LPLhI96E7JZud55g_PB4AvumT6fP6jrKvCz_quaEzurMPOsSl4f37Yhif1N_3kIenrKCEq6E3ZnuGB1TCkw_Zi4yqwwUdo1W7E",
    "token_type": "Bearer"
}
```

### HTTP Request
`POST api/v1/user/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | first name of the user
        `last_name` | string |  required  | last name of the user
        `gender` | string |  required  | gender of the user
        `city` | string |  required  | city of the user
        `uuid` | string |  required  | uuid comes from the validate otp's response
        `email` | email |  required  | email of the user
        `password` | password |  required  | password provided user
        `device_token` | string |  required  | device_token of the user
        `login_by` | tinyInt |  required  | from which device the user registered
    
<!-- END_7fef01e7235c89049ebe3685de4bff17 -->

<!-- START_ff99f8f6e7fa37138fa12697cdc0f56d -->
## Send the mobile number verification OTP during registration.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/register/send-otp" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"country":"a","mobile":3}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/register/send-otp"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country": "a",
    "mobile": 3
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success",
    "data": {
        "uuid": "6ffa38d1-d2ca-434a-8695-701ca22168b1"
    }
}
```

### HTTP Request
`POST api/v1/user/register/send-otp`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `country` | string |  required  | Country of the user
        `mobile` | integer |  required  | mMbile of the user
    
<!-- END_ff99f8f6e7fa37138fa12697cdc0f56d -->

<!-- START_2df80e5aa5ea9fd621612d35df1b6532 -->
## Validate the mobile number verification OTP during registration.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/register/validate-otp" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"otp":"sed","uui":"incidunt"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/register/validate-otp"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "otp": "sed",
    "uui": "incidunt"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/v1/user/register/validate-otp`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `otp` | string |  required  | Provided otp
        `uui` | string |  required  | uuid comes from sen otp api response
    
<!-- END_2df80e5aa5ea9fd621612d35df1b6532 -->

#Web-Authentication


APIs for Authentication
<!-- START_806efc7edf80f577102ab9e0651029a5 -->
## Login the Web admin users.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/spa/login" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/spa/login"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/spa/login`


<!-- END_806efc7edf80f577102ab9e0651029a5 -->

<!-- START_71473fc04fd0b4be57bc41bf47623f04 -->
## Login the normal user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/spa/user/login" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/spa/user/login"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`POST api/spa/user/login`


<!-- END_71473fc04fd0b4be57bc41bf47623f04 -->

<!-- START_a9cb4b0639caad74b509ee35fb5aed56 -->
## Logout the user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/spa/logout" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/spa/logout"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "success"
}
```

### HTTP Request
`GET api/spa/logout`

`POST api/spa/logout`

`PUT api/spa/logout`

`PATCH api/spa/logout`

`DELETE api/spa/logout`

`OPTIONS api/spa/logout`


<!-- END_a9cb4b0639caad74b509ee35fb5aed56 -->

#Web-Spa-Countries&Timezones


APIs for User-Management
<!-- START_6d72b9e257da7534e94d70f5ae46b700 -->
## Get all the countries.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/spa/common/countries" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/spa/common/countries"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": [
        {
            "id": 98,
            "slug": null,
            "name": "India",
            "iso2": null,
            "iso3": null
        }
    ]
}
```

### HTTP Request
`GET api/spa/common/countries`


<!-- END_6d72b9e257da7534e94d70f5ae46b700 -->

<!-- START_47dd2d8421359d6b3fc0be8bb3466f75 -->
## Get all the timezone.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/spa/common/timezones" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/spa/common/timezones"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "data": []
}
```

### HTTP Request
`GET api/spa/common/timezones`


<!-- END_47dd2d8421359d6b3fc0be8bb3466f75 -->

#general


<!-- START_639c2363d749d9e386837dae4059acf7 -->
## Register the admin user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/admin/register" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/register"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/admin/register`


<!-- END_639c2363d749d9e386837dae4059acf7 -->


