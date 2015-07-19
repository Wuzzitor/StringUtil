# StringUtil #

[![Build Status](https://travis-ci.org/Wuzzitor/StringUtil.svg?branch=master)](https://travis-ci.org/Wuzzitor/StringUtil)

## Introduction ##

This library provides a consistent, self-explaining layer to accomplish string related tasks.

Speaking method names make string operations more readable and reveal the intention clearly.
Please compare the following, common snippets regarding readability:

    // Native:
    if (strpos($log, 'failure') !== false) {
        // [...]
    }

    // With StringUtil:
    if (String::contains($log, 'failure')) {
        // [...]
    }

In contrast to the built-in PHP string functions, the library provides methods with consistent signatures,
which always expect the subject string as first parameter.

### Known Restrictions ###

This library is meant for common, light-weight string operations.
It is currently not designed for heavy, complex string tasks such as transparent charset handling.

## Installation ##

Add the following to your composer.json (see [getcomposer.org](http://getcomposer.org/)):

    "require" :  {
        // ...
        "wuzzitor/string-util": "~1.0"
    }

## Concept ##

The library provides a single class (``Wuzzitor\StringUtil\String``), whose static methods
are the entry points for all string operations.

All methods are stateless to ensure full testability and to avoid code that is hard to debug. 

## Usage ##

use Wuzzitor\StringUtil\String;

## License ##

Code released under [the MIT license](LICENSE).
