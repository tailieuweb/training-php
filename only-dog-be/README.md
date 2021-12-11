## Install / Update

```
yarn
```

## Start server

```
yarn dev
```

## Rest API

> ## Authentication

### Login
`POST `
```
POST /auth/login
```

### Register
`POST `
```
POST/auth/register
```

### Refresh access token
`PUT `
```
PUT /auth/refresh_access_token
```

### remove refresh token
`DELETE `
```
DELETE /auth/remove_refresh_token
```

### Logout
`DELETE `
```
/auth/remove_all_refresh_token
```

> ## Model Users

### Get list user

`GET `

```
/users
```

### Update Avatar User

`PUT `

```
/users/change_avatar_user
```

### Get userId's dashboard

`GET `

```
/posts/get_dashboard_user_id
```

### Find user by userName

`GET `

```
/users/find_by_name/:userName
```

### Get profile user

`GET `

```
/users/find_by_id/:userId
```

### Follow or Unfollow another user

`PUT`

```
/users/follow_and_unfollow
```

> ## Model Posts

### Get list post

`GET`

```
/posts
```

### Create new post

`POST`

```
/posts/add/add_image_post
```

### Like or Unlike one post

`PUT`

```
/posts/like
```

### Dislike or undislike one post

`PUT`

```
/posts/dislike
```
