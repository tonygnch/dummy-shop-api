# Dummy Shop API Documentation
##### Last updated on September 22nd 2022

The Dummy Shop is an API for the Key Dev Interview task.

---

# Products

## Show all proucts

### Request

**URL:** /api/products

**Method:** GET | HEAD

**Auth required:** Yes

**Headers:**

    {
        "Authorization": "Bearer [token]",
        "Content-Type": "application/json",
        "Accept": "application/json"
    }
 
### Success Response

**Code:** 200 OK

**Content :**
```
    {
        {
            "id": Number,
            "name": String,
            "departments": {
                {
                    "id": Number,
                    "name": String
                }
                ...
            }
        }   
        ...
    }
```
### Error Response

**Condition:** The authentication data is invalid

**Code:** 401 NOT AUTHENTICATED

**Content :**

    {
        "status": "error",
        "message": "Not authenticated"
    }
    
**Condition:** An internal server error occured. The response will contain a JSON Object with an error message.

**Code:** 500 INTERNAL SERVER ERROR

**Content :**

    {
        "status": "error"
        "message": String
    }

---

# Departments

## Show all departments

### Request

**URL:** /api/departments

**Method:** GET | HEAD

**Auth required:** Yes

**Headers:**

    {
        "Authorization": "Bearer [token]",
        "Content-Type": "application/json",
        "Accept": "application/json"
    }
 
### Success Response

**Code:** 200 OK

**Content :**
```
    {
        {
            "id": Number,
            "email": String,
            "name": String,
        }   
        ...
    }
```
### Error Response

**Condition:** The authentication data is invalid

**Code:** 401 NOT AUTHENTICATED

**Content :**

    {
        "status": "error",
        "message": "Not authenticated"
    }
    
**Condition:** An internal server error occured. The response will contain a JSON Object with an error message.

**Code:** 500 INTERNAL SERVER ERROR

**Content :**

    {
        "status": "error"
        "message": String
    }
