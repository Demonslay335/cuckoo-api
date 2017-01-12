# cuckoo-api
PHP wrapper for Cuckoo Sandbox API.

API wrapper baseline code borrowed from [VirusTotal API](https://github.com/jayzeng/virustotal_apiwrapper).

## Usage
- Install via composer (http://getcomposer.org/)

Include the following in your composer.json
```json
{
  "require": {
    "demonslay335/cuckoo-api": "master"
  }
}
```

```
composer update
```

## Quick Start
```
<?php
require_once('vendors/autoload.php');

$apiUrl = 'your_cuckoo_api_url';

$file = new Cuckoo\File($apiUrl);
$resp = $file->scan('path/to/executable.exe');

var_dump($resp);
?>
```

Sample output:
```
array(3) {
    ["status"] =>
    string(5) "added"
    ["sha256"] =>
    string(64) "14ebd45fc9162f8afc4fd10186a46d2fb9844bf27b9d3217fd9fdb4107f17acd"
    ["uuid"] =>
    string(43) "YWFmYTEwYTIwZjkwNDdiYWJjMmU1MWQ2ZjY1MWU3OTY"
}
```
## Tests
```bash
phpunit --configuration tests/conf/phpunit.xml tests
```