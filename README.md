# Vanda PHP
*A bare-bones MVC PHP framework*

Vanda PHP is a bare-bones MVC PHP framework. It is almost entirely based on the CakePHP framework. The core of being able to split your code into models, views and controllers remains whilst removing all the CakePHP code that you may well already have versions of. 

It is perfect to fit into existing code as at only around 80 lines of code it can be fitted in anywhere. It has been used multiple times in live environments to bring an MVC framework into new section inside existing code or to clean up existing spaghetti code.

## Installation

This is now available via [Composer](http://getcomposer.org). For a global composer installation run:

```
composer create-project ianchanning/vandaphp path/to/my/project
```

## Included from CakePHP

* automatic hookup from `view -> controller -> model`
* views, with variables generated in the controller
* controllers, that can call the associated model through `$this->modelName` and can pass variables to the view through `$this->set()`
* basic models
* layouts (added by popular request!)
* Disco fever

## Missing from CakePHP

* Behaviors
* Helpers
* Components
* View parameters
* All that jazz
