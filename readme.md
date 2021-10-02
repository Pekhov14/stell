# Hello, it`s stell.
## Helper for opencart migrations.

## Installing

1. In your composer.json set

```
...
"scripts": {
    "post-autoload-dump": [
        "cp -r vendor/pekhov/stell bin"
    ]
}
...
```

This code need for you will run script by name
> ./bin/stell


2. Install library
> composer require pekhov/stell

or write to "require"

```
"require": {
    "pekhov/stell": "^1.0"
},
```
if you added to the requirements
> composer install
