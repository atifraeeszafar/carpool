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
    -G "http://localhost/car-pool/public/api/v1/common/car/makes" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/common/car/makes"
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
    -G "http://localhost/car-pool/public/api/v1/common/car/models/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/common/car/models/1"
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
    -G "http://localhost/car-pool/public/api/v1/common/car/colors" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/common/car/colors"
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

<!-- START_865128b954ae802970aa0dd67ec398b1 -->
## List Car

> Example request:

```bash
curl -X GET \
    -G "http://localhost/car-pool/public/api/v1/user/list/car" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/list/car"
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
        "file": "\/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Application.php",
        "class": "Symfony\\Component\\HttpKernel\\Exception\\HttpException",
        "trace": [
            "#0 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/helpers.php(45): Illuminate\\Foundation\\Application->abort(403, '', Array)\n#1 \/var\/www\/html\/car-pool\/app\/Http\/Middleware\/RouteNeedsRole.php(36): abort(403)\n#2 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\RouteNeedsRole->handle(Object(Illuminate\\Http\\Request), Object(Closure), Array)\n#3 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php(41): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#4 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#5 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php(59): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#6 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Routing\\Middleware\\ThrottleRequests->handle(Object(Illuminate\\Http\\Request), Object(Closure), 60, '1')\n#7 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#8 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(683): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(658): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#10 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(624): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#11 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(613): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#12 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(170): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#13 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(130): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#14 \/var\/www\/html\/car-pool\/vendor\/proengsoft\/laravel-jsvalidation\/src\/RemoteValidationMiddleware.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#15 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Proengsoft\\JsValidation\\RemoteValidationMiddleware->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#16 \/var\/www\/html\/car-pool\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(58): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#17 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Barryvdh\\Debugbar\\Middleware\\InjectDebugbar->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 \/var\/www\/html\/car-pool\/app\/Http\/Middleware\/PjaxMiddleware.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\PjaxMiddleware->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#20 \/var\/www\/html\/car-pool\/app\/Http\/Middleware\/Cors.php(7): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#21 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\Cors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#22 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#23 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#24 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#25 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#26 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#27 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#28 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(63): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#29 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#30 \/var\/www\/html\/car-pool\/vendor\/hyn\/multi-tenant\/src\/Middleware\/EagerIdentification.php(29): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#31 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Hyn\\Tenancy\\Middleware\\EagerIdentification->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#32 \/var\/www\/html\/car-pool\/vendor\/hyn\/multi-tenant\/src\/Middleware\/HostnameActions.php(75): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#33 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Hyn\\Tenancy\\Middleware\\HostnameActions->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#34 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#35 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(145): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#36 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(110): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#37 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(307): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#38 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(289): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->callLaravelRoute(Object(Illuminate\\Http\\Request))\n#39 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(47): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->makeApiCall(Object(Illuminate\\Http\\Request))\n#40 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(172): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->__invoke(Object(Illuminate\\Routing\\Route), Object(ReflectionClass), Object(ReflectionMethod), Array, Array)\n#41 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(121): Mpociot\\ApiDoc\\Extracting\\Generator->iterateThroughStrategies('responses', Array, Array)\n#42 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(84): Mpociot\\ApiDoc\\Extracting\\Generator->fetchResponses(Object(ReflectionClass), Object(ReflectionMethod), Object(Illuminate\\Routing\\Route), Array, Array)\n#43 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(125): Mpociot\\ApiDoc\\Extracting\\Generator->processRoute(Object(Illuminate\\Routing\\Route), Array)\n#44 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(69): Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->processRoutes(Object(Mpociot\\ApiDoc\\Extracting\\Generator), Array)\n#45 [internal function]: Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->handle(Object(Mpociot\\ApiDoc\\Matching\\RouteMatcher))\n#46 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#47 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#48 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#49 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#50 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(590): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#51 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#52 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#53 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#54 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Application.php(1000): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#55 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Application.php(271): Symfony\\Component\\Console\\Application->doRunCommand(Object(Mpociot\\ApiDoc\\Commands\\GenerateDocumentation), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Application.php(147): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#57 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(131): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 \/var\/www\/html\/car-pool\/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 {main}"
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
    "http://localhost/car-pool/public/api/v1/user/add/car" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/add/car"
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
    "http://localhost/car-pool/public/api/v1/user/update/car/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/update/car/1"
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
    "http://localhost/car-pool/public/api/v1/user/delete/car/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/delete/car/1"
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
    -G "http://localhost/car-pool/public/api/v1/countries" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/countries"
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
    "http://localhost/car-pool/public/api/v1/email/confirm" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"token":"reprehenderit","email":"qui"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/email/confirm"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "reprehenderit",
    "email": "qui"
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
    "http://localhost/car-pool/public/api/v1/email/resend-confirmation" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"dolores"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/email/resend-confirmation"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "dolores"
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
    "http://localhost/car-pool/public/api/v1/password/forgot" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"quisquam"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/password/forgot"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quisquam"
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
    "http://localhost/car-pool/public/api/v1/password/validate-token" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"token":"omnis","email":"possimus"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/password/validate-token"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "omnis",
    "email": "possimus"
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
    "http://localhost/car-pool/public/api/v1/password/reset" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/password/reset"
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
    "http://localhost/car-pool/public/api/v1/payment/card/add" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"payment_nonce":"harum","last_number":11,"user_role":"ut"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/payment/card/add"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "payment_nonce": "harum",
    "last_number": 11,
    "user_role": "ut"
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
    -G "http://localhost/car-pool/public/api/v1/payment/card/list" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/payment/card/list"
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
    "http://localhost/car-pool/public/api/v1/payment/card/make/default" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/payment/card/make/default"
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
    "http://localhost/car-pool/public/api/v1/payment/card/delete/1" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/payment/card/delete/1"
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
<!-- START_da07716f2b3a785a29841a35b561db52 -->
## List Preferences questions &amp; answers

> Example request:

```bash
curl -X GET \
    -G "http://localhost/car-pool/public/api/v1/common/list/preferences" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/common/list/preferences"
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
            "id": 2,
            "question": "chattiness",
            "active": true,
            "answers": {
                "data": [
                    {
                        "id": 1,
                        "preference_id": 2,
                        "answer": "Im the quiet type"
                    },
                    {
                        "id": 2,
                        "preference_id": 2,
                        "answer": "I talk depending on my mood"
                    },
                    {
                        "id": 3,
                        "preference_id": 2,
                        "answer": "I love to chat"
                    }
                ]
            }
        },
        {
            "id": 3,
            "question": "smoking",
            "active": true,
            "answers": {
                "data": [
                    {
                        "id": 4,
                        "preference_id": 3,
                        "answer": "Cigarette smoke doesnt bother me"
                    },
                    {
                        "id": 5,
                        "preference_id": 3,
                        "answer": "No smoking in my car please"
                    },
                    {
                        "id": 6,
                        "preference_id": 3,
                        "answer": "Dont know"
                    }
                ]
            }
        },
        {
            "id": 4,
            "question": "pets",
            "active": true,
            "answers": {
                "data": [
                    {
                        "id": 7,
                        "preference_id": 4,
                        "answer": "Pets welcome"
                    },
                    {
                        "id": 8,
                        "preference_id": 4,
                        "answer": "No pets please"
                    },
                    {
                        "id": 9,
                        "preference_id": 4,
                        "answer": "Dont know"
                    }
                ]
            }
        },
        {
            "id": 5,
            "question": "music",
            "active": true,
            "answers": {
                "data": [
                    {
                        "id": 10,
                        "preference_id": 5,
                        "answer": "Its all about the playlist"
                    },
                    {
                        "id": 11,
                        "preference_id": 5,
                        "answer": "Silence is golden"
                    },
                    {
                        "id": 12,
                        "preference_id": 5,
                        "answer": "Dont know"
                    }
                ]
            }
        }
    ]
}
```

### HTTP Request
`GET api/v1/common/list/preferences`


<!-- END_da07716f2b3a785a29841a35b561db52 -->

<!-- START_3da20b53e7ac009a16bd3015dd822453 -->
## Update user password.

> Example request:

```bash
curl -X POST \
    "http://localhost/car-pool/public/api/v1/user/password" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/password"
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
    "http://localhost/car-pool/public/api/v1/user/profile" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/profile"
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
    "http://localhost/car-pool/public/api/v1/user/ride/offer" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"pickup_lat":528.28885,"pickup_lng":0.685205,"drop_lat":691451.2626,"drop_lng":46062.927367594,"pickup_address":"quasi","drop_address":"voluptas","date":"quia","start_time":"quo","stops":"quis","frequent_days":"vitae"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/ride/offer"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pickup_lat": 528.28885,
    "pickup_lng": 0.685205,
    "drop_lat": 691451.2626,
    "drop_lng": 46062.927367594,
    "pickup_address": "quasi",
    "drop_address": "voluptas",
    "date": "quia",
    "start_time": "quo",
    "stops": "quis",
    "frequent_days": "vitae"
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
    "http://localhost/car-pool/public/api/v1/user/ride/find" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"pickup_lat":24669774.880468,"pickup_lng":12247.1753,"drop_lat":73376.385027,"drop_lng":2873114.8,"pickup_address":"voluptatum","drop_address":"odit","date":"veniam","start_time":"aut"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/ride/find"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pickup_lat": 24669774.880468,
    "pickup_lng": 12247.1753,
    "drop_lat": 73376.385027,
    "drop_lng": 2873114.8,
    "pickup_address": "voluptatum",
    "drop_address": "odit",
    "date": "veniam",
    "start_time": "aut"
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
    -G "http://localhost/car-pool/public/api/v1/translation/get" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/translation/get"
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


> Example response (500):

```json
{
    "success": false,
    "message": "cURL error 6: Could not resolve host: sheets.googleapis.com (see https:\/\/curl.haxx.se\/libcurl\/c\/libcurl-errors.html)",
    "status_code": 500,
    "debug": {
        "line": 200,
        "file": "\/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Handler\/CurlFactory.php",
        "class": "GuzzleHttp\\Exception\\ConnectException",
        "trace": [
            "#0 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Handler\/CurlFactory.php(155): GuzzleHttp\\Handler\\CurlFactory::createRejection(Object(GuzzleHttp\\Handler\\EasyHandle), Array)\n#1 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Handler\/CurlFactory.php(105): GuzzleHttp\\Handler\\CurlFactory::finishError(Object(GuzzleHttp\\Handler\\CurlHandler), Object(GuzzleHttp\\Handler\\EasyHandle), Object(GuzzleHttp\\Handler\\CurlFactory))\n#2 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Handler\/CurlHandler.php(43): GuzzleHttp\\Handler\\CurlFactory::finish(Object(GuzzleHttp\\Handler\\CurlHandler), Object(GuzzleHttp\\Handler\\EasyHandle), Object(GuzzleHttp\\Handler\\CurlFactory))\n#3 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Handler\/Proxy.php(28): GuzzleHttp\\Handler\\CurlHandler->__invoke(Object(GuzzleHttp\\Psr7\\Request), Array)\n#4 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Handler\/Proxy.php(51): GuzzleHttp\\Handler\\Proxy::GuzzleHttp\\Handler\\{closure}(Object(GuzzleHttp\\Psr7\\Request), Array)\n#5 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/PrepareBodyMiddleware.php(37): GuzzleHttp\\Handler\\Proxy::GuzzleHttp\\Handler\\{closure}(Object(GuzzleHttp\\Psr7\\Request), Array)\n#6 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Middleware.php(29): GuzzleHttp\\PrepareBodyMiddleware->__invoke(Object(GuzzleHttp\\Psr7\\Request), Array)\n#7 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/RedirectMiddleware.php(70): GuzzleHttp\\Middleware::GuzzleHttp\\{closure}(Object(GuzzleHttp\\Psr7\\Request), Array)\n#8 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Middleware.php(59): GuzzleHttp\\RedirectMiddleware->__invoke(Object(GuzzleHttp\\Psr7\\Request), Array)\n#9 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/HandlerStack.php(71): GuzzleHttp\\Middleware::GuzzleHttp\\{closure}(Object(GuzzleHttp\\Psr7\\Request), Array)\n#10 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Client.php(351): GuzzleHttp\\HandlerStack->__invoke(Object(GuzzleHttp\\Psr7\\Request), Array)\n#11 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Client.php(162): GuzzleHttp\\Client->transfer(Object(GuzzleHttp\\Psr7\\Request), Array)\n#12 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Client.php(182): GuzzleHttp\\Client->requestAsync('get', Object(GuzzleHttp\\Psr7\\Uri), Array)\n#13 \/var\/www\/html\/car-pool\/vendor\/guzzlehttp\/guzzle\/src\/Client.php(95): GuzzleHttp\\Client->request('get', 'https:\/\/sheets....', Array)\n#14 \/var\/www\/html\/car-pool\/app\/Http\/Controllers\/Api\/V1\/Common\/TranslationController.php(21): GuzzleHttp\\Client->__call('get', Array)\n#15 [internal function]: App\\Http\\Controllers\\Api\\V1\\Common\\TranslationController->index()\n#16 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php(54): call_user_func_array(Array, Array)\n#17 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php(45): Illuminate\\Routing\\Controller->callAction('index', Array)\n#18 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(219): Illuminate\\Routing\\ControllerDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(App\\Http\\Controllers\\Api\\V1\\Common\\TranslationController), 'index')\n#19 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(176): Illuminate\\Routing\\Route->runController()\n#20 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(681): Illuminate\\Routing\\Route->run()\n#21 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(130): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#22 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php(41): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#23 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#24 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php(59): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#25 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Routing\\Middleware\\ThrottleRequests->handle(Object(Illuminate\\Http\\Request), Object(Closure), 60, '1')\n#26 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#27 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(683): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(658): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#29 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(624): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#30 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(613): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#31 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(170): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#32 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(130): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#33 \/var\/www\/html\/car-pool\/vendor\/proengsoft\/laravel-jsvalidation\/src\/RemoteValidationMiddleware.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#34 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Proengsoft\\JsValidation\\RemoteValidationMiddleware->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#35 \/var\/www\/html\/car-pool\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(58): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#36 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Barryvdh\\Debugbar\\Middleware\\InjectDebugbar->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#37 \/var\/www\/html\/car-pool\/app\/Http\/Middleware\/PjaxMiddleware.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#38 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\PjaxMiddleware->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#39 \/var\/www\/html\/car-pool\/app\/Http\/Middleware\/Cors.php(7): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#40 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\Cors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#41 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#42 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#43 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#44 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#45 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#46 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#47 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(63): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#48 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#49 \/var\/www\/html\/car-pool\/vendor\/hyn\/multi-tenant\/src\/Middleware\/EagerIdentification.php(29): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#50 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Hyn\\Tenancy\\Middleware\\EagerIdentification->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#51 \/var\/www\/html\/car-pool\/vendor\/hyn\/multi-tenant\/src\/Middleware\/HostnameActions.php(75): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#52 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Hyn\\Tenancy\\Middleware\\HostnameActions->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#53 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#54 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(145): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#55 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(110): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#56 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(307): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#57 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(289): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->callLaravelRoute(Object(Illuminate\\Http\\Request))\n#58 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(47): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->makeApiCall(Object(Illuminate\\Http\\Request))\n#59 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(172): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->__invoke(Object(Illuminate\\Routing\\Route), Object(ReflectionClass), Object(ReflectionMethod), Array, Array)\n#60 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(121): Mpociot\\ApiDoc\\Extracting\\Generator->iterateThroughStrategies('responses', Array, Array)\n#61 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(84): Mpociot\\ApiDoc\\Extracting\\Generator->fetchResponses(Object(ReflectionClass), Object(ReflectionMethod), Object(Illuminate\\Routing\\Route), Array, Array)\n#62 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(125): Mpociot\\ApiDoc\\Extracting\\Generator->processRoute(Object(Illuminate\\Routing\\Route), Array)\n#63 \/var\/www\/html\/car-pool\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(69): Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->processRoutes(Object(Mpociot\\ApiDoc\\Extracting\\Generator), Array)\n#64 [internal function]: Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->handle(Object(Mpociot\\ApiDoc\\Matching\\RouteMatcher))\n#65 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#66 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#67 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#68 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#69 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(590): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#70 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(134): Illuminate\\Container\\Container->call(Array)\n#71 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#72 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#73 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Application.php(1000): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#74 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Application.php(271): Symfony\\Component\\Console\\Application->doRunCommand(Object(Mpociot\\ApiDoc\\Commands\\GenerateDocumentation), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#75 \/var\/www\/html\/car-pool\/vendor\/symfony\/console\/Application.php(147): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#76 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#77 \/var\/www\/html\/car-pool\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(131): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#78 \/var\/www\/html\/car-pool\/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#79 {main}"
        ]
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
    "http://localhost/car-pool/public/api/v1/user/login/send-otp" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"mobile":"hic"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/login/send-otp"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile": "hic"
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
    "http://localhost/car-pool/public/api/v1/user/login" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"quisquam","mobile":"omnis","password":"quia"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/login"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "quisquam",
    "mobile": "omnis",
    "password": "quia"
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
    "http://localhost/car-pool/public/api/v1/admin/login" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/admin/login"
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
    "http://localhost/car-pool/public/api/v1/logout" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/logout"
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
<!-- START_7fef01e7235c89049ebe3685de4bff17 -->
## Register the user and send welcome email.

> Example request:

```bash
curl -X POST \
    "http://localhost/car-pool/public/api/v1/user/register" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"non","last_name":"aut","gender":"rerum","city":"deleniti","uuid":"ipsa","email":"sequi","password":"quia","device_token":"quasi","login_by":"sed"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/register"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "non",
    "last_name": "aut",
    "gender": "rerum",
    "city": "deleniti",
    "uuid": "ipsa",
    "email": "sequi",
    "password": "quia",
    "device_token": "quasi",
    "login_by": "sed"
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
    "http://localhost/car-pool/public/api/v1/user/register/send-otp" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"country":"voluptas","mobile":19}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/register/send-otp"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "country": "voluptas",
    "mobile": 19
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
    "http://localhost/car-pool/public/api/v1/user/register/validate-otp" \
    -H "Authorization: Bearer: {token}" \
    -H "Content-Type: application/json" \
    -d '{"otp":"debitis","uui":"eius"}'

```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user/register/validate-otp"
);

let headers = {
    "Authorization": "Bearer: {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "otp": "debitis",
    "uui": "eius"
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

<!-- START_d7f5c16f3f30bc08c462dbfe4b62c6b9 -->
## Get the current logged in user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/car-pool/public/api/v1/user" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/user"
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

#Web-Authentication


APIs for Authentication
<!-- START_806efc7edf80f577102ab9e0651029a5 -->
## Login the Web admin users.

> Example request:

```bash
curl -X POST \
    "http://localhost/car-pool/public/api/spa/login" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/spa/login"
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
    "http://localhost/car-pool/public/api/spa/user/login" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/spa/user/login"
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
    -G "http://localhost/car-pool/public/api/spa/logout" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/spa/logout"
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
    -G "http://localhost/car-pool/public/api/spa/common/countries" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/spa/common/countries"
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
    -G "http://localhost/car-pool/public/api/spa/common/timezones" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/spa/common/timezones"
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
    "http://localhost/car-pool/public/api/v1/admin/register" \
    -H "Authorization: Bearer: {token}"
```

```javascript
const url = new URL(
    "http://localhost/car-pool/public/api/v1/admin/register"
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


