# toast

----

This library allows you display temporary messages on your Code Igniter websites.

### Installation ###

To install, download and install Splint from https://splint.cynobit.com/downloads/splint and then run the below from your Code Igniter project root

```bash
splint install francis94c/toast
```

### Loading ###

```php
$params = array (
    "toast_class" => "class",
    "timeout"     => 5000
);
$this->load->splint("francis94c/toast", "+Toast", $params, "toast");
```

### Usage ###

