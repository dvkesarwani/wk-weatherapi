                                    Weather API


Develop a simple Laravel application using best practices that calculates the average temperature forecast of a city. 
- User should be able to enter the name of a city and a 2-letter country code. The application will lookup the weather forecast of that city.
- The application then averages the forecasted temperature of the next 10 days. This result need to be stored in the cache for two hours.
- If someone tries to calculate the average temperature of a city that has already been calculated the results should be returned from the cache. After two hours the cache should be updated.
- Used Laravel 8 and Vue  for this assignment. 
