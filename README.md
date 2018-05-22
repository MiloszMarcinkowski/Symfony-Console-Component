# Symfony-Console-Component 

Recruiting project for 2MD

## Getting Started

Download or clone repository and install libraries by running in console: 

```
composer install
```

## CLI Commands 

### First Command 

Command must take a string parameter containing text and will check if “John” and “Mary” names are found the same number of times inside the provided text. Function is case insensitive. If the number of times is the same it return 1, if not it return 0.

First command:
```
php bin/console app:finder <phrase>
```
e.g.
```
php bin/console app:finder "Mery has a cat and johnnny not"
```
Result:
```
=====Result=====
1
```

### Second Command

Command must take a string parameter containing array of products in JSON. It return PHP object and JSON string with products sorted by price ascending, and if price is the same sorted alphabetically ascending.

!important:
Input command argument <json_string> without line break. (in one line like in example below) 

Second command:
```
php bin/console app:json <json_string>
```
e.g.
```
php bin/console app:json "[{"title": "H&M T-Shirt White","price": 10.99,"inventory": 10},{"title": "Magento Enterprise License","price": 1999.99,"inventory": 9999},{"title": "iPad 4 Mini","price": 500.01,"inventory": 2},{"title": "iPad Pro","price": 990.20,"inventory": 2},{"title": "Garmin Fenix 5","price": 789.67,"inventory": 34},{"title": "Garmin Fenix 3 HR Sapphire Performer Bundle","price": 789.67,"inventory": 12}]"
```
Result:
```

=====Result in PHP object=======

array(6) {
  [0]=>
  object(stdClass)#2 (3) {
    ["title"]=>
    string(17) "H&M T-Shirt White"
    ["price"]=>
    float(10.99)
    ["inventory"]=>
    int(10)
  }
  [2]=>
  object(stdClass)#35 (3) {
    ["title"]=>
    string(11) "iPad 4 Mini"
    ["price"]=>
    float(500.01)
    ["inventory"]=>
    int(2)
  }
  [5]=>
  object(stdClass)#46 (3) {
    ["title"]=>
    string(43) "Garmin Fenix 3 HR Sapphire Performer Bundle"
    ["price"]=>
    float(789.67)
    ["inventory"]=>
    int(12)
  }
  [4]=>
  object(stdClass)#38 (3) {
    ["title"]=>
    string(14) "Garmin Fenix 5"
    ["price"]=>
    float(789.67)
    ["inventory"]=>
    int(34)
  }
  [3]=>
  object(stdClass)#12 (3) {
    ["title"]=>
    string(8) "iPad Pro"
    ["price"]=>
    float(990.2)
    ["inventory"]=>
    int(2)
  }
  [1]=>
  object(stdClass)#44 (3) {
    ["title"]=>
    string(26) "Magento Enterprise License"
    ["price"]=>
    float(1999.99)
    ["inventory"]=>
    int(9999)
  }
}

=====Result in JSON string=======

string(401) "{"0":{"title":"H&M T-Shirt White","price":10.99,"inventory":10},"2":{"title":"iPad 4 Min
i","price":500.01,"inventory":2},"5":{"title":"Garmin Fenix 3 HR Sapphire Performer Bundle","price":7
89.67,"inventory":12},"4":{"title":"Garmin Fenix 5","price":789.67,"inventory":34},"3":{"title":"iPad
 Pro","price":990.2,"inventory":2},"1":{"title":"Magento Enterprise License","price":1999.99,"invento
ry":9999}}"
```
### Author 

Miłosz Marcinkowski