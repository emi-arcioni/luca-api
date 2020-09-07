# Luca DEMO

This API was made for demonstrative purposes.

### Requeriments

* PHP ^7.3
* MySQL 8

### Installation and configuration

1. Clone the repository into your local environment 
    
    ```bash
    git clone https://github.com/emi-arcioni/luca-api
    ```

1. Run composer to install the vendor libraries locally

    ```bash
    luca-api $ composer intall
    ```

1. Configure the .env file with MySQL database connection information. The variables that you have to look at are:

    ```DB_DATABASE```, ```DB_USERNAME``` and ```DB_PASSWORD```

1. Run artisan migrate with seeder option

    ```bash
    luca-api $ php artisan migrate --seed
    ```

    The seeder contains dummy data so it would be easier to test the performance of this API.

1. Turn on development server

    ```bash
    luca-api $ php artisan serve
    ```

---

# Available endpoints

## Show Students

Show all the registered users / students. Includes the assignments that the user is registered in, and the videos matching with that assignments.

**URL** : `/api/students/`

**URL Parameters** : 
* `q=[string]` where `q` is the string that will be used to search in first_name or last_name
* `page=[number]` where `page` is the page number that you want to get

**Method** : `GET`

**Auth required** : NO

### Success Response

**Code** : `200 OK`

```json
[
    {
        "id": 805,
        "name": {
            "first": "Tyrel",
            "last": "Auer"
        },
        "email": "ogusikowski@example.org",
        "thumbnail": "https://lorempixel.com/640/640/animals/?13917",
        "phone_number": "(482) 966-8677 x21747",
        "address": "15381 Morar Hill\nEdmondview, IA 41901",
        "assignments": [
            {
                "id": 1,
                "name": "Biología",
                "videos": [
                    {
                        "id": 1,
                        "name": "Big Buck Bunny",
                        "duration": "09:56",
                        "url": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                    }
                ]
            }
        ]
    }
]
```

### Notes

* If no `page` parameter is passed, it will assume `page=1`
* The response array contains 25 students per page 

## Show Assignments

Show all the available assignments. Includes the videos for each item.

**URL** : `/api/assignments/`

**Method** : `GET`

**Auth required** : NO

### Success Response

**Code** : `200 OK`

```json
[
    {
        "id": 1,
        "name": "Biología",
        "videos": [
            {
                "id": 1,
                "name": "Big Buck Bunny",
                "duration": "09:56",
                "url": "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
            }
        ]
    }
]
```