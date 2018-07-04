# chippyash/Identity

## Quality Assurance

![PHP 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg)
![PHP 7](https://img.shields.io/badge/PHP-7-blue.svg)
[![Build Status](https://travis-ci.org/chippyash/identity.svg)](https://travis-ci.org/chippyash/Identity)
[![Test Coverage](https://api.codeclimate.com/v1/badges/fc8854ae418eacd98d3d/test_coverage)](https://codeclimate.com/github/chippyash/identity/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/fc8854ae418eacd98d3d/maintainability)](https://codeclimate.com/github/chippyash/identity/maintainability)

See the [Test Contract](https://github.com/chippyash/identity/blob/master/docs/Test-Contract.md)

## What?

Provides a simple helper capability for class Identity management

## Why?

This is one of those bits of code you write over and over.  Many applications require 
the classes they use to have some form of Identity.  Typically in data driven applications
this will equate to the `id` primary key field.  This library provides support for that.
   
### Roadmap

   
If you want more, either suggest it, or better still, fork it and provide a pull request.

Check out [ZF4 Packages](http://zf4.biz/packages?utm_source=github&utm_medium=web&utm_campaign=blinks&utm_content=identity) for more packages

## How

### Coding Basics

The code is supplied as an interface and a trait.  Simply declare your class as
implementing the `Identifiable` interface and then use the `Identifying` trait in the
class to supply the functionality.

Identities are based on Chippyash\Type\Interfaces\TypeInterface.  This allows for
strong typing and enforcement of identity rules.  For instance, here is an example
of a product id that is a fixed length digit string.

<pre>
use Chippyash\Type\String\DigitType;

/**
 * A unique identifier
 */
class Identifier extends DigitType
{
    /**
     * Length of product id, it will be front padded with zeros to this length
     * or cut to this length
     *
     * @var int
     */
    protected $length = 10;

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    protected function typeOf($value)
    {
        $v = parent::typeOf($value);
        if (strlen($v) > $this->length) {
            return substr($v, -$this->length);
        }

        return str_pad($v, $this->length, '0',STR_PAD_LEFT);
    }
}
</pre> 

Your class can then simpy use it thus:

<pre>
use Chippyash\Identity\Identifiable;
use Chippyash\Identity\Identifying;

class Product implements Identifiable
{
	use Identifying;
	
	public function __construct(Identifier $id)
	{
		$this->id = $id;
		//or maybe there is some other way of establishing the identity
	}
}

$product = new Product(new Identifier(53));
$id = $product->id(); // returns Identifier
$vId = $product->vId(); //returns '0000000053'
$vId = $product->id()->get(); //returns '0000000053'
</pre>

### Changing the library

1.  fork it
2.  write the test
3.  amend it
4.  do a pull request

Found a bug you can't figure out?

1.  fork it
2.  write the test
3.  do a pull request

NB. Make sure you rebase to HEAD before your pull request

Or - raise an issue ticket.

## Where?

The library is hosted at [Github](https://github.com/chippyash/identity). It is
available at [Packagist.org](https://packagist.org/packages/chippyash/identity)

### Installation

Install [Composer](https://getcomposer.org/)

#### For production

<pre>
    "chippyash/identity": ">=1,<2"
</pre>

#### For development

Clone this repo, and then run Composer in local repo root to pull in dependencies

<pre>
    git clone git@github.com:chippyash/identity.git
    cd identity
    composer update
</pre>

To run the tests:

<pre>
    cd identity
    vendor/bin/phpunit -c test/phpunit.xml test/
</pre>

## License

This software library is released under the [BSD 3 Clause license](https://opensource.org/licenses/BSD-3-Clause)

This software library is Copyright (c) 2015, Ashley Kitson, UK

## History

V1.0.0 Original release

V1.0.1 Updates for build running

V1.0.2 Documentation update

V1.0.3 composer.json fix

V1.0.4 dependency update

V1.1.0 Change of license from GPL V3 to BSD 3 Clause