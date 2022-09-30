# Dummy Shop API Documentation
##### Last updated on September 22nd 2022

The Dummy Shop is an API for the Key Dev Interview task.

---

# Products

## Show all proucts

### Request

**URL:** /api/products

**Method:** GET

**Auth required:** Yes

**Query Params:**
Parameter|Data Type|Required/Optional|
------|-------|------
 page | Number | optional

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
        "success": "true",
        "lastPage": 14,
        "data": [
            "id": Number,
            "name": String,
            "type": String,
            "stock": Number,
            "color": String,
            "price" => Number,
            "material" => $this->material,
            "rating" => $this->rating,
            "sales" => $this->sales,
            "image" => $this->image,
            "department": {
                {
                    "id": Number,
                    "name": String
                },
            },
            "related": {
                {
                    "id": Number,
                    "name": String,
                    "type": String,
                    "stock": Number,
                    "color": String,
                    "price" => Number,
                    "material" => $this->material,
                    "rating" => $this->rating,
                    "sales" => $this->sales,
                    "image" => $this->image,
                    "department": {
                        {
                            "id": Number,
                            "name": String
                        },
                    }
                }
            }
            ...
        ] 
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

**Method:** GET

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
            "name": String
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
