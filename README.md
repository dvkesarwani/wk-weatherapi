                                    Weather API


Develop a simple Laravel application using best practices that calculates the average temperature forecast of a city. 
- User should be able to enter the name of a city and a 2-letter country code. The application will lookup the weather forecast of that city.
- The application then averages the forecasted temperature of the next 10 days. This result need to be stored in the cache for two hours.
- If someone tries to calculate the average temperature of a city that has already been calculated the results should be returned from the cache. After two hours the cache should be updated.


------------------------------Technologies Used:

Laravel 8

Vue 2

Tailwindcss

Laravel Mix

Angolia Places API

WeatherBit API

--------------------------- setup environment and running the app

composer global require laravel/installer

laravel new wk_weatherapi

composer update

composer require laravel/ui

php artisan ui vue

npm install

npm run dev

npm run watch

![TestResult](/test-result.png?raw=true "Test")

open browser 127.0.0.1:8000

![BrowserView](/browser_view.png?raw=true "Weather Forecast")

