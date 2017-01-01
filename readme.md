Configure the database in .env file

Locate the project folder destination in terminal

Type "php artisan migrate --seed"

Type "php artisan serve" to start

Done

I'm using Stripe Test Payement

For Stripe Payments go to https://dashboard.stripe.com/register

Click skip this step to get into dashboard

![alt tag](public/stripe.png "Description goes here")

If you are on dashboard, click "Your Account" on top left on page

Go Account Settings , then get the api keys



![alt tag](public/apikey.png "You will see like this,Do not from this image.")

Copy the Test Secret Key in Stripe Dashboard site

Paste into App\Http\Controllers\ProductController setApiKey in line 73.

