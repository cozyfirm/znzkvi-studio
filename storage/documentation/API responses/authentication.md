#### Authentication screen

##### 1. Method call

- Create HTTP POST request on route https://app.colors.ba/api/auth
- Query params

        - username (varchar)
        - password (varchar)

##### 2. Response code = "0000" after authentication; Success

```json
{ 
  "code": "0000",
  "message": "Success",
  "data" : {  
    "username":"johndoe", 
    "email": "john@doe.com",
    "api_token": "64byteLongToken"
  }
}       
```

##### 2. Global error

```json
{ 
  "code": "1101",
  "message": "Error while processing your request. Please contact an administrator"
}       
```

##### 3. Empty username

```json
{ 
  "code": "1102",
  "message": "Please, enter your username"
}       
```

##### 4. Empty password

```json
{ 
  "code": "1103",
  "message": "Please, enter your password"
}       
```

##### 5. Unknown username

```json
{ 
  "code": "1104",
  "message": "Unknown username"
}       
```

##### 6. Wrong password

```json
{ 
  "code": "1105",
  "message": "You have entered wrong password"
}       
```

#### Get user info

##### 2. Method call

- Create HTTP POST request on route https://app.colors.ba/api/users/get-data
- Query params

        - api_token (64byteLongToken | varchar)

##### 2.1 Response code = "0000" after fetching data; Success

```json
{ 
  "code": "0000",
  "message": "Logged user",
  "data" : {  
    "username":"johndoe", 
    "email": "john@doe.com"
  }
}       
```

##### 2.2 Global error

```json
{ 
  "code": "2001",
  "message": "Error while processing your request. Please contact an administrator"
}       
```
