# Budbee PHP Wrapper
This repository is a PHP wrapper of the budbee Open API. The API is used to create Order bookings at budbee.

# Installation
Add budbee-php to your `composer.json` file

```php
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/crimsonab/budbee-php"
        }
    ],
    "require": {
        "budbee/api-client": "master"
    }
}
```

Run ```php composer.phar install```

# Code Example

To create an Order a user needs to:
 1. Validate the delivery postalcode
 2. Request an available delivery interval.
 3. Post an Order with an accepted delivery postalcode and an acceptable delivery interval

## Setup

Require the wrapper

```php
<?php
  require_once('vendor/autoload.php');

  $apiKey = '<YOUR_API_KEY>';
  $apiSecret = '<YOUR_API_SECRET>';

  $api = new \Budbee\Client($apiKey, $apiSecret, Budbee\Client::$SANDBOX);
  $postalCodesAPI = new \Budbee\PostalcodesApi($api);
  $intervalAPI = new \Budbee\IntervalApi($api);
  $orderAPI = new \Budbee\OrderApi($api);
?>
```

## Validate a postalcode

```php
try {
    $possibleCollectionPoints = $postalCodesAPI->checkPostalCode('11453','SE');
} catch (\Budbee\Exception\BudbeeException $e) {
    die('Budbee does not deliver to specified Postal Code');
}
```

## Get upcoming delivery intervals

```php
try {
    $intervalResponse = $intervalAPI->getIntervals('11453','SE', 2);
} catch (\Budbee\Exception\BudbeeException $e) {
    die('No upcoming delivery intervals');
}

$firstInterval = $intervalResponse[0];
$interval = new \Budbee\Model\OrderInterval($firstInterval->collection, $firstInterval->delivery);
$collectionPointId = $firstInterval->collectionPointId;

echo 'Budbee can deliver between: ' + $interval->delivery->start + ' and ' + $interval->delivery->stop;

```

## Create an order

```php
// Create Order Object
$order = new \Budbee\Model\OrderRequest();
$order->interval = $interval;
$order->collectionId = $collectionPointId;

// Create Cart Object
$order->cart = new \Budbee\Model\Cart();
$order->cart->cartId = '12345';

// Specify Delivery information
$order->delivery = new \Budbee\Model\Contact();;
$order->delivery->name = 'John Doe';
$order->delivery->telephoneNumber = '00 123 45 67';
$order->delivery->email = 'john.doe@budbee.com';
$order->delivery->doorCode = '0000';
$order->delivery->outsideDoor = true;

$order->delivery->address = new \Budbee\Model\Address();
$order->delivery->address->street = 'Grevgatan 9';
$order->delivery->address->postalCode = '11453';
$order->delivery->address->city = 'Stockholm';
$order->delivery->address->country = 'SE';

$createdOrder = $orderAPI->createOrder($order);

echo 'Created Order';
```

# Edit the delivery contact of an order

```php
$order = $orderAPI->createOrder($order);
$deliveryContact = $order->delivery;
$deliveryContact->name = 'Jane Doe';

$updatedOrder = $orderAPI->editDeliveryContact($order->id, $deliveryContact);
```
