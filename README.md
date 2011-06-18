PHP Micro
=========

Building the source
-------------------

Firstly, the source for PHP Micro doesn't need to be built in order to use it
for your projects. However, the makefile will analyze your code, report
statistics about your project, and run test cases as you add them to the tests
directory. It will also generate a code browser which will provide you a GUI
to view the results of this analysis. 

In order to get the Makefile to build, you must install the following
dependancies in your PATH:

	* pdepend
	* phpmd
	* phpunit
	* phploc
	* PHP_CodeSniffer

### Note:

*With the exception of phpunit, I realize that these applications are
less-than-stable, but they are the only tools that I am aware of which solve
these problems for PHP. If there are any better options, please let me know
at your earliest convenience. More stable projects will always be considered.
Either way, the current makefile should use them in a bug-free manner.*

If you have PEAR and PHP's curl[^1] module installed, then these can be installed
easily with the following commands:

`   pear channel-discover pear.pdepend.org
    pear channel-discover pear.phpmd.org
    pear channel-discover pear.phpunit.de
    pear channel-discover components.ez.no
    pear channel-discover pear.symfony-project.com

    pear install pdepend/PHP_Depend
    pear install phpmd/PHP_PMD
    pear install phpunit/phpcpd
    pear install phpunit/phploc
    pear install PHPDocumentor
    pear install PHP_CodeSniffer
    pear install --alldeps phpunit/PHP_CodeBrowser
    pear install --alldeps phpunit/PHPUnit`

The build process used by this project is a "fork" of the process described
on another developer's website[^2] which was ported over to GNU make, because
Apache ANT is a horrible build system that uses XML for all of the wrong
reasons.

### Note:

*If you want to hack on this project in order to make it better and send pull
requests, all steps must pass with no errors or warnings. There are currently
no exceptions to this rule, but requests will be considered on a per-case
basis for warnings. However, they must be for very good reasons. If it can
be fixed, the pull wont be accepted into the master branch.*

[^1] curl is required for phpunit's XMLRPC dependancy to function properly

