# Laravel Blog APi


## Task Requiremnts:
- Adding a post, erasing or modifying it
- Adding a comment to a post, erasing or modifying it
- The comment can be answered and the response can be answered
- The user can like a post or comment

# API documentation:
All API End points and documentation can be found at:
[This link](https://elements.getpostman.com/redirect?entityId=22137553-47c44bca-ffd4-4ee5-b9fa-9aa8f73ba5ed&entityType=collection).

The following is just a simple list of the api end points:

>POST /api/auth/login

>POST /api/auth/register

>GET  /api/auth/logout

>GET  /api/posts

>GET  /api/posts/id:postID

>POST /api/posts

>POST /api/posts/id:postID/comments

>POST /api/comments/comment:ID/replies

>POST /api/auth/getNotifications

# Installation

Install the dependencies and start the server to test the Api.

```sh
$ php artisan key:generate
$ php artisan migrate
$ php artisan jwt:secret 
$ php artisan db:seed
```

