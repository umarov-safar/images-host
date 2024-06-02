## Installation and Configuration

1. Clone repo
```shell
git clone https://github.com/umarov-safar/images-host.git
``` 
```shell
cd images-host
```
2. Copy `.env.example` to  `.env`
```shell
cp .env.example .env
```
3. Set database variables in `.env` file

4. Generate key
```shell
php artisan key:generate
```
5. Link to storage
```shell
php artisan storage:link
```
6. Run server
```shell
php artisan serve
```
It runs local server the link must be somthing like this: http://127.0.0.1:8000
7. Run schedule to delete old zip files
```shell
php artisan schedule:work
```


### API 
1. List images

`GET` `/api/v1/images`

```json
{
    "data": [
        {
            "id": 1,
            "name": "somefile-name.jpg",
            "created_at": "datetime"
        },
        {
            "id": 2,
            "name": "somefile-name.jpg",
            "created_at": "datetime"
        },
    ]
}
```

2. Image by ID

`GET`: `/api/v1/images/2`
```json
{
    "data": {
        "id": 2,
        "name": "somefile-name.jpg",
        "created_at": "datetime"
    }
}
```


### Enjoy it!
