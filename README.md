# AgaDateConverterBundle #

## About ##

This bundle adds a Twig Extension with a filter for automatically converting date to more human readable format:

- Yesterday
- 5 minutes ago
- 2 hours ago
- 3 days ago

and many more formats...

[![Build Status](https://secure.travis-ci.org/aga/AgaDateConverterBundle.png)](http://travis-ci.org/aga/AgaDateConverterBundle)

## Installation ##

    1. Add this bundle to your project as a Git submodule:

        $ git submodule add git://github.com/artur-gajewski/date-converter-bundle.git vendor/bundles/Aga/AgaDateConverterBundle

    2. Add the Aga namespace to your autoloader:

        // app/autoload.php
        $loader->registerNamespaces(array(
            'Aga' => __DIR__.'/../vendor/bundles',
            // your other namespaces
        ));

    3. Add this bundle to your application's kernel:

        // application/ApplicationKernel.php
        public function registerBundles()
        {
          return array(
              // ...
              new Aga\DateConverterBundle\AgaDateConverterBundle(),
              // ...
          );
        }

## Usage ##

This library adds a filter for twig templates that can be used like:

    {{ item.created | createdAgo }}

## License ##

See `LICENSE`.
