c57_base_package
================

A starting point for new concrete5.7 packages. Could also be used as a reference for updating older packages or inspiration for how to do things.

This should work right out of the box.

When the package gets installed, the Core\Installer is run. There are configurations in this file that allow for:
* Changing the requirements for installation
* Installation of new Attribute Types
* Installation of new Attribute Categories
* Installation of new Attributes with configurable types, categories and options
* Installation of new Blocks
* Installation of new Pages
* Installation of a settings table in the database and initial settings into that table
* Installation of new Jobs

Adding Installation Requirements
--------------------------------
The requirements for installation are changed in the Core\Installer\Checks file. Here you create static methods that do some sort of checking of requirements (over and above the ones already in place by c5). These requirements could be an extension installed on the server or another package already installed.

For each static method in the Checks file, you would add a corresponding entry into the Core\Installer $preInstallationRequirements array.

Caveats
-------
Note that you still need to do the heavy lifting of creating the code behind all of the jobs, types, categories, pages, and whatnot. This is just intended to be a starting point for how a package could be built and installed.
