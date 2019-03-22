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
$this->load->splint("francis94c/toast", "+Toast", $params, "toaster");
```

### Usage ###

A simple way to use this library is call the below method

```php
$this->toaster->toast("My Message goes here.", "green-bg", 5000); // ($message, $css_class, $timeout)
// OR
$this->toaster->toast("My message goes here.", 5000); // ($message, $timeout)
```

The second parameter is a CSS class used to style the background of the toast message. 

the class and timeout parameters override the values supplied to the constructor. to use the values supplied to the constructor ```$params``` avoid giving the values when you call the ```toast()``` function.

You can display multiple toast messages at the same time by calling ```$toast``` function as many times as you need.

The image below shows the result of the following code.

```php
$this->toaster->toast("hello", "w3-green", 3000);
$this->toaster->toast("message", "w3-green", 3000);
```

![Toast Sample](https://res.cloudinary.com/francis94c/image/upload/v1553285157/toast.png)

There's another way you can make use of this library.

The toast library optionally makes use of Code Igniter's session library to temporarily store messages that would be read when you actually want to display the message. The use case goes like this.

* User clicks a button that takes him/her to a Controller function to perform some operations. probably contents from a form.
* The results for the operation are determined.
* Library latches a message unto it's session variable before redirecting to a result page.
* the result page now reads this message and displays.

```php
// To latch message.
$this->toaster->latch("My Latched message to later be displayed by calling toast() without arguments.", "class");

// To display latched message.
$this->toaster->toast();
```