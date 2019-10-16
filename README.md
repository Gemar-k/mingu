# Mingu Framework
The mingu framework is a simple to use framework
that is developed for students to use for there projects.
Mingu is currently used for The32chan.

# Getting Started
Here you can read how to use the mingu framework.

## Router
To initiate a route in web.php you can use multiple
methods. 

### Function Route
Example 1:
`$router->get('your/route/here', function(){
require 'resources/views/yourviewhere';
'}');`

### Controller Route
Example 1:
`$router->get('your/route/here', 'YourController@yourfunction'');`


### Naming Routes
Example 1:
`$router->get('your/route/here', function(){
require 'resources/views/yourviewhere';
'}')->name('your name here');`

Example 2:
`$router->get('your/route/here', 'YourController@yourfunction'')->name('your name here')`
`