# PBS NYC API Documentation

## Authentication
All authenticated routes require a JWT token in the Authorization header.

### Authentication Endpoints
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/register` | Register new user |
| POST | `/api/user/login` | Login user |
| GET | `/api/user/logout` | Logout user |
| GET | `/api/user` | Get current user details |
| POST | `/api/user/update` | Update user profile |
| GET | `/api/user/properties` | Get user's properties |

### Authentication Examples

#### Register User
```json
POST /api/user/register
Request:
{
    "name": "User Name",
    "email": "user@example.com",
    "password": "password",
    "password_confirmation": "password"
}

Response:
{
    "success": true,
    "token": "jwt_token_here",
    "user": {
        "id": 1,
        "name": "User Name",
        "email": "user@example.com",
        ...
    }
}
```

#### Login
```json
POST /api/user/login
Request:
{
    "email": "user@example.com",
    "password": "password",
    "fcm_token": "optional_fcm_token_for_notifications"
}

Response:
{
    "success": true,
    "token": "jwt_token_here",
    "user": {
        "id": 1,
        "name": "User Name",
        "email": "user@example.com",
        ...
    }
}
```

#### Update Profile
```json
POST /api/user/update
Request:
{
    "email": "new_email@example.com",
    "password": "new_password",        // Optional
    "photo": "profile_image_file",     // Optional
    "contact_number": "phone_number",   // Optional
    "address": "user_address",         // Optional
    "company": "company_name"          // Optional
}

Response:
{
    "success": true,
    "message": "Information has been updated successfully!",
    "user": {
        "id": 1,
        "name": "User Name",
        ...
    },
    "token": "jwt_token"
}
```

### Department of Buildings (DOB)
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/DOBliveViolations` | Get active DOB violations |
| POST | `/api/user/DOBswo` | Get Stop Work Orders |
| POST | `/api/user/DOBcomplaints` | Get DOB complaints |
| POST | `/api/user/DobJobFilings` | Get DOB job filings |
| POST | `/api/user/DobNowJobFilings` | Get DOB NOW job filings |
| POST | `/api/user/BsaApplicationStatus` | Get BSA application status |

### Environmental Control Board (ECB)
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/ECBliveHearings` | Get active ECB hearings |
| POST | `/api/user/ECBliveDue` | Get due penalties |
| POST | `/api/user/ECBdefaulted` | Get defaulted cases |
| POST | `/api/user/ECBimposed` | Get imposed penalties |
| POST | `/api/user/ECBoverpaid` | Get overpaid penalties |
| POST | `/api/user/ECBcorrections` | Get corrections |
| POST | `/api/user/ECBcomplaints` | Get complaints |
| POST | `/api/user/ECBviolations` | Get violations |

### Fire Department (FDNY)
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/FDNYliveHearings` | Get active FDNY hearings |
| POST | `/api/user/FDNYcorrections` | Get corrections |
| POST | `/api/user/FDNYliveDue` | Get due penalties |
| POST | `/api/user/FDNYactiveViolOrders` | Get active violation orders |
| POST | `/api/user/FDNYcomplaints` | Get complaints |

### Housing Preservation & Development (HPD)
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/HPDliveViolations` | Get active HPD violations |
| POST | `/api/user/HPDcomplaints` | Get complaints |
| POST | `/api/user/HPDrepairs` | Get repairs |
| POST | `/api/user/HPDlitigations` | Get litigations |
| POST | `/api/user/HPDregistrations` | Get registrations |

### Inspections
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/InspectionsDOBboiler` | Get DOB boiler inspections |
| POST | `/api/user/InspectionsDEPboiler` | Get DEP boiler inspections |
| POST | `/api/user/InspectionsFacade` | Get facade inspections |
| POST | `/api/user/InspectionsOthers` | Get other inspections |

### Permits
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/user/PermitsDOBpermits` | Get DOB permits |
| POST | `/api/user/PermitsDOBNOWpermits` | Get DOB NOW permits |
| POST | `/api/user/PermitsDOBElevatorpermits` | Get elevator permits |
| POST | `/api/user/PermitsDOBahv` | Get after-hours variance permits |
| POST | `/api/user/PermitsFDNYAccount` | Get FDNY account permits |
| POST | `/api/user/PermitsElevator` | Get elevator permits |

### Other Features
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/user/articles` | Get latest articles |
| POST | `/api/user/articlecontent` | Get article content |
| POST | `/api/user/setting` | Get user settings |
| POST | `/api/user/sendemail` | Send contact email |
| POST | `/api/user/notifications` | Get user notifications |
| POST | `/api/user/readNotification` | Mark notification as read |

## Public Endpoints

### Contact Form Submission
```json
POST /api/contact
Request:
{
    "full_name": "John Doe",
    "email": "john@example.com",
    "phone": "+1234567890",
    "message": "Your message here"
}

Response (Success - 200):
{
    "success": true,
    "message": "Thank you for contacting us. We will get back to you soon.",
    "data": {
        "full_name": "John Doe",
        "email": "john@example.com",
        "phone": "+1234567890",
        "message": "Your message here"
    }
}

Response (Validation Error - 422):
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["The email field is required."],
        "full_name": ["The full name field is required."]
        // ... other validation errors
    }
}

Response (Server Error - 500):
{
    "success": false,
    "message": "An error occurred while processing your request. Please try again later.",
    "error": "Detailed error message (only in debug mode)"
}
```

## Request/Response Examples

### Authentication
#### Register User
```json
POST /api/user/register
{
    "name": "User Name",
    "email": "user@example.com",
    "password": "password",
    "password_confirmation": "password"
}
```

#### Login
```json
POST /api/user/login
{
    "email": "user@example.com",
    "password": "password"
}
```

### Property Data
Most endpoints require a property_id in the request body:
```json
POST /api/user/DOBliveViolations
{
    "property_id": "123"
}
```

## Error Handling
All endpoints return standard HTTP status codes:
- 200: Success
- 400: Bad Request
- 401: Unauthorized
- 403: Forbidden
- 404: Not Found
- 500: Server Error

## Rate Limiting
The API implements Laravel's default rate limiting. Please contact support for specific limits.

## Security
- All requests must use HTTPS
- Authentication is handled via JWT tokens
- Tokens expire after 60 minutes
- Refresh tokens are valid for 2 weeks
- FCM token support for push notifications
- Profile images are stored in /photos/ directory
- Supported image formats: jpeg, png, jpg, gif, svg (max: 2MB)

## Error Responses
```json
// Authentication Error
{
    "success": false,
    "message": "Token is required"
}

// Invalid Login
{
    "success": false,
    "message": "Invalid Email or Password"
}

// Logout Error
{
    "success": false,
    "message": "Sorry, the user cannot be logged out"
}

// Update Error
{
    "success": false,
    "message": "User is not found"
}
```

## Property Data Endpoints

### Get Properties
```json
GET /api/user/properties

Response:
{
    "success": true,
    "data": [
        {
            "id": 1,
            "house_number": "123",
            "stname": "Main St",
            "documents": [...],
            "notes": [...],
            "summary": {...}
        }
    ]
}
```

### DOB Violations
```json
POST /api/user/DOBliveViolations
Request:
{
    "property_id": "123"
}

Response:
{
    "success": true,
    "data": [
        {
            "issue_date": "2024-02-20",
            "device_number": "123456",
            "description": "Violation description",
            "number": "V123456",
            "violation_category": "Category",
            "violation_type": "Type",
            "disposition_date": null,
            "status": "OPEN"
        }
    ]
}
```

### DOB Stop Work Orders
```json
POST /api/user/DOBswo
Request:
{
    "property_id": "123"
}

Response:
{
    "success": true,
    "data": [
        {
            "complaint_number": "123456",
            "date_entered": "2024-02-20",
            "status": "ACTIVE",
            "category": "SWO",
            "description": "Stop Work Order description"
        }
    ]
}
```

### Common Error Response Format
All endpoints follow this error format:
```json
{
    "success": false,
    "message": "Authentication error."
}
```

## Authentication Requirements
- All endpoints except `/api/user/register` and `/api/user/login` require authentication
- Authentication is done via JWT token in the Authorization header
- Token format: `Bearer <jwt_token>`

## Request Format Guidelines
1. All property-related endpoints require a `property_id` in the request body
2. Dates are returned in YYYY-MM-DD format
3. All responses include a `success` boolean field
4. Error responses include a `message` field
5. Successful responses include a `data` field with the requested information

## Data Relationships
Properties can have:
- Documents
- Notes
- Summary information
- DOB violations
- DOB complaints
- OATH hearings
- HPD violations
- HPD complaints
- Inspections
- Permits

## Request Format Guidelines
1. All property-related endpoints require a `property_id` in the request body
2. Dates are returned in YYYY-MM-DD format
3. All responses include a `success` boolean field
4. Error responses include a `message` field
5. Successful responses include a `data` field with the requested information

## Access Control & Rate Limiting

### Middleware
The API implements several layers of middleware for security and access control:

1. **Authentication Middleware**
   - All protected routes require JWT authentication
   - Token must be included in Authorization header

2. **Role-based Access**
   - Some endpoints may require specific roles:
     - `paid` - Requires active payment
     - `gold` - Gold membership required
     - `bronze` - Bronze membership required

3. **Rate Limiting**
   - API requests are throttled using Laravel's default rate limiter
   - Applies to all API routes
   - Rate limits are enforced per user/IP

### Security Features
1. **CORS Protection**
   - API implements Cross-Origin Resource Sharing protection
   - Requests must come from allowed origins

2. **Request Validation**
   - Post size validation
   - Empty string handling
   - CSRF protection for web routes

3. **Performance Optimizations**
   - DNS prefetching enabled
   - URL trimming
   - Attribute elision for better performance

## Response Headers
The API returns several important headers:
- `X-RateLimit-Limit`: Maximum number of requests per window
- `X-RateLimit-Remaining`: Number of requests remaining in current window
- `Retry-After`: Seconds to wait when rate limit is exceeded

## Error Codes
In addition to standard HTTP status codes, the API may return:
- 429: Too Many Requests (rate limit exceeded)
- 401: Unauthorized (invalid or expired token)
- 403: Forbidden (insufficient role/permissions)
- 422: Unprocessable Entity (validation failed) 