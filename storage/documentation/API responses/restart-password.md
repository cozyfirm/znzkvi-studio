#### Restart password screen

##### 1. Create request for password restart

- Create HTTP POST request on route https://app.colors.ba/api/auth/restart-password/generate-pin
- Query params

        - email (varchar)

After the email is inserted, new 4 digits pin will be created and sent over email. 

##### 1.1 Response code = "0000" - Email sent successfully

```json
{ 
  "code": "0000",
  "message": "Email sent successfully. Follow instructions"
}       
```

##### 1.2 Global error

```json
{ 
  "code": "1201",
  "message": "Error while processing your request. Please contact an administrator"
}       
```

##### 1.3 Empty email

```json
{ 
  "code": "1202",
  "message": "Please, enter your email"
}       
```

##### 1.4 Unknown email

```json
{ 
  "code": "1203",
  "message": "Unknown email"
}       
```

##### 2. Create request for pin verification

- Create HTTP POST request on route https://app.colors.ba/api/auth/restart-password/verify-pin
- Query params

        - email (varchar)
        - pin (4 digits varchar)

If PIN code is verified, proceed to continue with password restart

##### 2.1 Response code = "0000" - PIN verified

```json
{ 
  "code": "0000",
  "message": "Pin code is correct. Proceed to continue"
}       
```

##### 2.2 Global error

```json
{ 
  "code": "1201",
  "message": "Error while processing your request. Please contact an administrator"
}       
```

##### 2.3 Empty email

```json
{ 
  "code": "1204",
  "message": "Email cannot be empty"
}       
```

##### 2.4 Empty pin code

```json
{ 
  "code": "1205",
  "message": "PIN code cannot be empty"
}       
```

##### 2.5 Incorrect PIN code

```json
{ 
  "code": "1206",
  "message": "Incorrect pin"
}       
```

##### 3. Create request to generate new password

- Create HTTP POST request on route https://app.colors.ba/api/auth/restart-password/new-password
- Query params

        - email (varchar)
        - pin (4 digits varchar)
        - password (varchar)

If everything is verified, new password is created and redirect to login route ..


##### 3.1 Response code = "0000" - Password changed
```json
{ 
  "code": "0000",
  "message": "Password changed successfully"
}       
```

##### 3.2 Global error
```json
{ 
  "code": "1201",
  "message": "Error while processing your request. Please contact an administrator"
}       
```

##### 3.3 Empty email
```json
{ 
  "code": "1207",
  "message": "Email cannot be empty"
}       
```

##### 3.4 Empty pin code
```json
{ 
  "code": "1208",
  "message": "PIN code cannot be empty"
}       
```

##### 3.5 Empty password
```json
{ 
  "code": "1209",
  "message": "Password cannot be empty"
}       
```

##### 3.6 Password validation 

```json
{ 
  "code": "1207",
  "message": "Password must contain at least 8 characters | Password must contain at least one digit | Password must contain letters | Password must contain at least one special character"
}       
```
