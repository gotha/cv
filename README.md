# CV 

## Dev server

```sh
php -S localhost:3000 -c .php.ini
```

## Generate html

```sh
php -c .php.ini index.php > index.html
```

## Generate PDF

### with wkhtmltopdf

```sh
yay -S wkhtmltopdf
```

```sh
wkhtmltopdf http://localhost:3000 output.pdf
```

### Via Safari

On OSX with Safari, open the page and click File -> Export as PDF
