## Start a dev server
#### Requirements
Docker


#### Docker
in CLI navigate to root file, run command `docker-compose up` wait untill the process is finished.

### CLI
once the docker mplaylist container is finised. navigate to root directory of the file and type `composer update`
after that `php artisan migrate` and `php artisan db:seed` 

you can pull api request to an endpoint:
GET:api/v1/playlist
POST:api/v1/songs/create
GET:api/v1/songs/{id}
PUT:api/v1/songs/{id}
DELETE:api/v1/songs/{id}




