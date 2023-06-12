## Adding Bootstrap 5 using Laravel Mix

In Laravel Mixing Bootstrap 5 Install is difficult than 1 and 2 method. you need to install first node npm if you do not have node npm package then install first other wise Laravel mix not working .

```
npm install  
```

Next, you can see node_modules Folder it mean npm is working. Now we need to install bootstrap 5

```
npm install bootstrap@next --save-dev
``` 

Next,we need run one more command npm install @popperjs/core --save-dev

```
npm install @popperjs/core --save-dev
```

After, you can see in package.json

```
"devDependencies": {
    "@popperjs/core": "^2.9.2",
    "axios": "^0.21",
    "bootstrap": "^5.0.0-beta3",
    "laravel-mix": "^6.0.6",
    "lodash": "^4.17.19",
    "postcss": "^8.1.14"
}
```

Next, you need to create folder scss inside app.scss file.resources/scss/app.scss put  @import "~bootstrap/scss/bootstrap";

```
@import "~bootstrap/scss/bootstrap";
```

Next, For Js you need to add only resources/js/bootstrap.js put import "bootstrap";

```
window._ = require("lodash");
import "bootstrap";
```

Then,run last command

```
npx mix
```

## Adding Font-awesome using Laravel Mix

```
npm install font-awesome --save
```
Then edit the resources/assets/sass/app.scss file and add at the top this line:

```
@import "node_modules/font-awesome/scss/font-awesome.scss";
```
# bookstore-app
