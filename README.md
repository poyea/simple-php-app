# simple-php-app
Extremely simple PHP application that writes to a file, with docker

## Build
`docker build -t myapp:1.0 .`

## Use case
`/app/index.php` modifies `/app/saved.txt`.

`/app/index2.php` modifies `/app/mnt/saved.txt`.

Mount persistent volume to `/app/mnt/`.
