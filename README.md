## Documentation
####  Requirements
- Node JS (version 16.x.x recommended)
- Docker
- Docker Compose
- PHP 
### Steps to get started with WordPress default theme

Clone the project
```
git@github.com:Buzzvel/wordpress-starter-theme.git
```

Enter in the project folder
```
cd wordpress-starter-theme
```

Go to [theme.json](theme.json) and configure the `slug` and the `name` of your theme. 
 **important** (insert the slug in `snake_case`.)

After configured the theme `name` and `slug`, generate your theme:
```
make generate
```

After MySQL container loads, write de SQL script 
```
make write_db
```

Run the project 
```
make up 
```

**important** is high recommended that you update the npm dependencies in your theme `npm update` after the generate process.
```
make update
```

You can acess your theme folder in [default_theme](default_theme)

You can change environment variables in  [.env](.env)

Default access in http://localhost:8080 and http://localhost:3000 (watch mode)


**username**: admin

**password**: admin