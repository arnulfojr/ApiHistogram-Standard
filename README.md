ApiHistogram
============

Under development (23 March 2016)

Dev release and Documentation - 25 March 2016

---------------------------------------------

Installation
============

- If you wish to use the bundle, remember this is not yet released
software.
- For installing clone the repository.
- Call ```composer install``` or ```composer update``` to get all
the dependencies set.
- Enable ```ApiHistogramBundle``` in the Kernel (not needed in the
Standard version)
- Fill the currency_url from the ```parameters``` file.
    + I used http://apilayer.net/api/live
- Be sure the response matches the ```CurrencyCleaner``` formatting,
else develop your own by implementing the ```CleanerInterface``` and
define the wished namespace to load the ```Cleaner``` in the config
file inside the website definition ```formatter```
    + For now ```ApiHistogram``` does not create the table on the first
    API call, will in the future but for now set the table structure
    in advance.

---------

Description
===========

ApiHistogram allows developers to query API data and save
 the response data automatically and  trying to be as flexible as
 possible.
 
This allows to have "LIVE" data coming every time the command line tool
is called ```php app/console api-histogram:update```

----------------------------------------------------