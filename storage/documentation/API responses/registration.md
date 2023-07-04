#### Registration screen

##### 1. Method call

- Create HTTP POST request on route https://app.colors.ba/api/auth/register
- Query params

        - email (varchar)
        - password (varchar)
        - username (varchar)

##### 1. Response code = "0000" after registration; Success

```json
{ 
  "code": "0000",
  "message": "Your account has been created",
  "data" : {  
    "id": 1,
    "email": "john@doe.com",
    "username":"johndoe", 
    "api_token": "64byteLongToken"
  }
}       
```

##### 2. Global error

```json
{ 
  "code": "1001",
  "message": "Error while processing your request. Please contact an administrator"
}       
```

##### 3. Empty email

```json
{ 
  "code": "1002",
  "message": "Please, enter your email"
}       
```

##### 4. Empty password

```json
{ 
  "code": "1003",
  "message": "Please, enter your password"
}       
```

##### 5. Empty username

```json
{ 
  "code": "1004",
  "message": "Please, enter your username"
}       
```

##### 6. Duplicate entry (email)

```json
{ 
  "code": "1005",
  "message": "This email has already been used"
}       
```

##### 7. Duplicate entry (username)

```json
{ 
  "code": "1006",
  "message": "This username has already been used"
}       
```

##### 8. Password validation 

```json
{ 
  "code": "1007",
  "message": "Password must contain at least 8 characters | Password must contain at least one digit | Password must contain letters | Password must contain at least one special character"
}       
```
