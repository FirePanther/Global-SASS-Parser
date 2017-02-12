# SASS Parser

I create many little scripts for myself and am too lazy to install something like gulp everytime and watch the .scss files.
Because of that I don't use SASS for smaller projects and my CSS files get uglier and the project could get bigger and the CSS file even uglier!

That's why I create this little (global) script. I don't need to watch any scss files anymore, I just directly embed the files into the html.
Requesting .scss files return the compiled .css files now.

# Demo

http://su.at/archive/demo.scss

# Dependency

Download the scssphp Compiler: http://leafo.net/scssphp/

Put the directory into the sassparser directory, should look like this: .../sassparser/scssphp/scss.inc.php

## Tip

You have to embed the scss file directly into your HTML:

```html
<link rel="stylesheet" href="assets/css/style.scss">```

The SASS Parser creates a css file from the sass file. You could toggle a boolean developer variable or constant to quickly change between css and scss:

```php
<link rel="stylesheet" href="assets/css/style.<?= $dev ? 's' : '' ?>css">```

Or even more dynamic:

```php
<link rel="stylesheet" href="assets/css/style.<?= filemtime('assets/css/style.css') < filemtime('assets/css/style.scss') ? 's' : '' ?>css">```

But you don't have to :) you just can embed the .scss file, the SASS Parser is very fast and doesn't compile again if it doesn't need to.

## Folder Structure

If you create a css folder with a scss folder in it the compiled css file will be created in the css folder (parent folder of the scss file).
Else the css file will be created next to the scss file.

### Example

`css/scss/style.scss` compiles to `css/style.css`  
`css/style.scss` compiles to `css/style.css`  
`styles/style.scss` compiles to `styles/style.css`  

## .htaccess

Don't forget the rewrite rules. I use Apache so I just create a .htaccess file to redirect all .scss requests to the SASS Parser php script.
You can create rewrite rules in nginx, too.

## Password

For what the password? Just in case :)  
The php script reads and writes files, just to be sure it should only be executed over the rewrite rule.

You should change the password and add it to the .htaccess and the php script.

# License

## MIT License

### Copyright © 2017 Suat Secmen <https://su.at/mit>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
