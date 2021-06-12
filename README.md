# Rest Api for CURD for user
I have build the restfull Api for the user model

## To Start 

1. Clone this repo
2. Run Composer Install
3. Run npm install (Optional)
4. Create a new database, import the sql file from the SQL Folder
5. run php artisan serve

# Protected Route with Auth Middleware

## This routes are protected by auth.basic middleware, so you will be asked to login with attempting to access these routes from a browers
## If you using PostMan Or Any related software to access this api;

1. You can go to authorization
2. Under type select Basic Auth

![plot](https://github.com/Sonawap/Restful-API-For-User-CURD/blob/main/public/img/cv.PNG)

3. Then Input the Username and Password, user
    username - email@email.com
    password = password


# API Created, Types of Request you can make


1. GET - /user/allUsers - This will get a list of all users on this app
2. GET - /user/:id - This will get a user with the specific ID or return null
3. GET - /user - This will get the autheticiated user
4. DELETE -/user/:id - This will delete a user with the specific ID
4. PUT -/user/:id - This will update the user information with the ID


## Unprotected Route without Auth Middleware

4. POST - /user/register - This will create a new user
5. POST - /user/login - This will anthenticate a user

# Examples


## GET AUTH
```php
    //send a GET request to
   'domain.com/api/user'
   'https://patricia.sonawap.com.ng/api/user/'

   //response
    {
        "status": "Success",
        "user": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "email_verified_at": null,
            "phone": "string",
            "photo": "string",
            "created_at": "string",
            "updated_at": "string",
            "deleted_at": null,
        }
    }
```

## FETCH A USER

```php
    //send a GET request to
   'domain.com/api/user/:id'
   'https://patricia.sonawap.com.ng/api/user/1'

   //response
    {
        "status": "Success",
        "user": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "email_verified_at": null,
            "phone": "string",
            "photo": "string",
            "created_at": "string",
            "updated_at": "string",
            "deleted_at": null,
        }
    }
```

## DELETE A USER

```php
    //send a DELETE request to
   'domain.com/api/user/:id'
   'https://patricia.sonawap.com.ng/api/user/1'

   //response
    {
        "status": "success",
        "message": "User has been deleted",
        "user": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "email_verified_at": null,
            "phone": "string",
            "photo": "string",
            "created_at": "string",
            "updated_at": "string",
            "deleted_at": null,
        }
    }
```

## GET ALL USERS
```php
    //send a delete request to
   'domain.com/api/user/allUsers'
   'https://patricia.sonawap.com.ng/api/user/allUsers'

   //response
    {
        "status": "success",
        "users": {
            "user array"
        }
    }
```

## CREATE A USER

```php
    //send a POST request to
   'domain.com/api/user/register?email=email@gmail.com&name=Paul Sola Moses&phone=7473839283&password=password'
   'https://patricia.sonawap.com.ng/api/user/register?email=email@email.com&password=password&name=Patrica&phone=2345445566666'

   //response
    {
        "status": "Account has been Created",
        "user": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "email_verified_at": null,
            "phone": "string",
            "photo": "string",
            "created_at": "string",
            "updated_at": "string",
            "deleted_at": null,
        }
    }
```


## LOGIN A USER

```php
    //send a POST request to
   'domain.com/api/user/login?email=email@gmail.com&password=password'
   'https://patricia.sonawap.com.ng/api/user/login?email=email@email.com&password=password'

   //response if login success
    {
        "status": "success",
        "user": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "email_verified_at": null,
            "phone": "string",
            "photo": "string",
            "created_at": "string",
            "updated_at": "string",
            "deleted_at": null,
        }
    }

    // response if no user found

    {
        "status": "error",
        "data": {
            "message": "Unauthorised, no user with that email or password"
        }
    }
```


## UPDATE A USER

```php
    //send a PUT request to
   'domain.com/api/user/:id?email=email@gmail.com&password=password'
   'https://patricia.sonawap.com.ng/api/user/4/?email=email@email.com&password=password'

   //response
    {
        "status": "Account has been updated",
        "user": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "email_verified_at": null,
            "phone": "string",
            "photo": "string",
            "created_at": "string",
            "updated_at": "string",
            "deleted_at": null,
        }
    }
```
