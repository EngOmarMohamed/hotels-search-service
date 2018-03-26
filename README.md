# hotels-search-service
[![Maintainability](https://api.codeclimate.com/v1/badges/4d21396014613c6c2132/maintainability)](https://codeclimate.com/github/EngOmarMohamed/hotels-search-service/maintainability)
[![Build Status](https://travis-ci.org/EngOmarMohamed/hotels-search-service.svg?branch=master)](https://travis-ci.org/EngOmarMohamed/hotels-search-service)

Tajawal Hotels Search Service Using <a href="https://lumen.laravel.com/">Lumen- Micro Framework</a>

### Description
#####This is a RESTful API Service to allow hotels search in an external source (<a href="https://api.myjson.com/bins/tl0bp">Inventory</a>) by any of the following:
- Hotel Name
- Destination [City]
- Price range [ex: $100:$200]
- Date range [ex: 10-10-2020:15-10-2020]

and allow sorting by:

- Hotel Name
- Price

This is including search by multiple criteria in the same time like search by destination and price together.

#####<a href="https://github.com/EngOmarMohamed/hotels-search-service/tree/master/hotel-service">Service Achticture</a>
#####Steps
######Step#1
- Request the Search URL

First of the RequestHandler takes the input parameters and validate these inputs depends on hotel rules then map them to a well-format array to work on them

######Step#2
- Load Data From the Source

Then Load the data from the API Inventory by using <a href="http://docs.guzzlephp.org/en/stable/quickstart.html">Guzzle, PHP HTTP client</a>

######Step#3
- Map the Loaded Data to array of Objects

After Loading the data, Mapping it to an array of Hotel Objects

######Step#4
- Build Operations Over the Mapped Data

In this step using <a href="https://laravel.com/docs/5.6/collections">Laravel Collections</a> was a good choice which provides useful functions like: Filter, SortBy that helped a alot

#####Structure
- Common: contains Handler, Validator, CustomValidationException Implementations
- Entity: contains Hotel, Availability Entities
- Filters: contains all filters types EqualFilter, ContainFilter, PriceRangeFilter, DateRangeFilter
- Interfaces: contains all contracts (interfaces) in the service
- Loader: contains the data loaders (now we use only APILoader)
- Mapper: contains the data mappers (now we map only Hotles)
- Provider: has InitProvider that extends the Service Provider to register service containers
- Repository: conatins generic Repository that is extended by other Repositories (now we only use HotelRepository) 

###Installation
After cloning the Repo
```
cd hotels-search-service
composer install
```

###Running the tests
```
cd hotels-search-service
vendor/bin/phpunit
```

### Usage
#####Hotels Search
- List All ```http://localhost/hotels-search-service/public/index```
- Hotel Name ```http://localhost/hotels-search-service/public/index?name=golden```
- Hotel City ```http://localhost/hotels-search-service/public/index?city=dubai```
- Price Range ```http://localhost/hotels-search-service/public/index?min=50&max=200```
- Date Range ```http://localhost/hotels-search-service/public/index?start=01-10-2020&end=09-10-2020```

#####Hotels Sort
- Hotel Name ```http://localhost/hotels-search-service/public/index?orderBy=name```
- Price ```http://localhost/hotels-search-service/public/index?orderBy=price&orderType=desc```

#####Hotels Multi Conditions Search and Sort
```http://localhost/hotels-search-service/public/index?orderBy=price&orderType=asc&name=hotel&start=11-10-2020&end=12-10-2020&min=100&max=200&city=dubai```