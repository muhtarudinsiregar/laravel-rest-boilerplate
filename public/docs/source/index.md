---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Auth

APIs for auth user
<!-- START_7ba029714012cd9c08cc50ae4dee9d7a -->
## Login a user

[Insert optional longer description of the API endpoint here.]

> Example request:

```bash
curl -X POST "http://localhost/api/auth/login" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/auth/login",
    "method": "POST",
    "headers": {
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/login`


<!-- END_7ba029714012cd9c08cc50ae4dee9d7a -->


