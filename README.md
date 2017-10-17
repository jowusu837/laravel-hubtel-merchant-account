# Hubtel Merchant Account integration for Laravel 5
[![Latest Release on GitHub][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Based on https://developers.hubtel.com/documentations/merchant-account-api

## About

The `laravel-hubtel-merchant-account` package allows you to accept and process payments using [Hubtel Merchant Account API](https://developers.hubtel.com/documentations/merchant-account-api) directly in your Laravel application.

## Features

* Receive mobile money
* Send mobile money
* Check status of transaction
* Online checkout

## Installation

Require the `jowusu837/laravelhubtelmerchantaccount` package in your `composer.json` and update your dependencies:
```sh
$ composer require jowusu837/laravelhubtelmerchantaccount
```
If you're using Laravel 5.5, this is all there is to do.

Should you still be on older versions of Laravel, the final steps for you are to add the service provider of the package and alias the package. To do this open your `config/app.php` file.

Add the HubtelMerchantAccount\ServiceProvider to your `providers` array:
```php
Jowusu837\HubtelMerchantAccount\ServiceProvider::class,
```
And add a new line to the `aliases` array:
```php
'aliases' => [
      ...
      'HubtelMerchantAccount' => Jowusu837\HubtelMerchantAccount\HubtelMerchantAccountFacade::class,
      ...
 ]
```

## Using Online Checkout feature

Let's say you are using this feature from a controller method, you can do it like so:

```php
namespace App\Http\Controllers;

use Jowusu837\HubtelMerchantAccount\OnlineCheckout\Item;
use HubtelMerchantAccount;
use App\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  
  ...
  
  public function payOnline(Request $request)
    {
        $order = Order::where('session_id', $request->session()->getId())->latest()->first();

        if (!$order) {
            abort(404, 'Invalid order!');
        }

        // Initiate online checkout
        $ocRequest = new \Jowusu837\HubtelMerchantAccount\OnlineCheckout\Request();
        $ocRequest->invoice->description = "Invoice description";
        $ocRequest->invoice->total_amount = $order->total;
        $ocRequest->store->name = "My Shop";
        $ocRequest->store->logo_url = asset('/img/logo.png');
        $ocRequest->store->phone = "0243XXXXXX";
        $ocRequest->store->postal_address = "P. O. Box 123456";
        $ocRequest->store->tagline = "Best online shop ever";
        $ocRequest->store->website_url = env('APP_URL');
        $ocRequest->actions->cancel_url = url('/checkout/done');
        $ocRequest->actions->return_url = url('/checkout/done');

        foreach ($order->items as $item) {

            $invoiceItem = new Item();
            $invoiceItem->name = $item->product_name;
            $invoiceItem->description = "";
            $invoiceItem->quantity = $item->quantity;
            $invoiceItem->unit_price = $item->price;
            $invoiceItem->total_price = $item->price * $item->quantity;

            $ocRequest->invoice->addItem($invoiceItem);
        }

        HubtelMerchantAccount::onlineCheckout($ocRequest);
    }
```

## Receive Mobile Money

This feature is under development. Will update soon.

## Configuration

The defaults are set in `config/hubtelmerchantaccount.php`. Copy this file to your own config directory to modify the values. You can publish the config using this command:
```sh
$ php artisan vendor:publish --provider="Jowusu837\HubtelMerchantAccount\ServiceProvider"
```

    
```php
return [

    /**
     * Merchant account number
     */
    "account_number" => env('HUBTEL_MERCHANT_ACCOUNT_NUMBER'),

    /**
     * Login credentials for hubtel api
     *
     */
    "api_key" => [
        "client_id" => env('HUBTEL_MERCHANT_ACCOUNT_CLIENT_ID'),
        "client_secret" => env('HUBTEL_MERCHANT_ACCOUNT_CLIENT_SECRET')
    ],

    /**
     * Store details
     */
    "store" => [
        "name" => env('APP_NAME')
    ]
];
```
    
## License

Released under the MIT License, see [LICENSE](LICENSE).

[ico-version]: https://img.shields.io/github/release/jowusu837/laravelhubtelmerchantaccount.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jowusu837/laravelhubtelmerchantaccount.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jowusu837/laravelhubtelmerchantaccount.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jowusu837/laravelhubtelmerchantaccount.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jowusu837/laravelhubtelmerchantaccount
[link-scrutinizer]: https://scrutinizer-ci.com/g/jowusu837/laravelhubtelmerchantaccount/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jowusu837/laravelhubtelmerchantaccount
[link-downloads]: https://packagist.org/packages/jowusu837/laravelhubtelmerchantaccount
[link-author]: https://github.com/jowusu837
[link-contributors]: ../../contributors
