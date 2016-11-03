# Mediaskates project
This project started as a school project to work with PHP/Mysql/Html/CSS etc...

It was initially created as a private Bitbucket repository as we tried to create something similar to [MediaSkates](http://mediaskates.com), a platform to share roller-skating pictures.

We had authorization to create this "remix", and use existing pictures (as logos, etc...).

As the time on the project ran out, we decided to publish it on GitHub, so here it is.

We used Laravel and Homestead.

As it was our first project, we may have done things wrong. Come and discuss about it in the issues !

## Thanks and credits:
The project has been made by @lecourtv, @Corbiezorq and @mtancoigne:

   - Idea: @lecourtv
   - Database design: @lecourtv, @Corbiezorq
   - VM, bash scripts and laravel setup: @mtancoigne
   - Models, Controllers and backend views : @Corbiezorq + @mtancoigne
   - Public HTML/CSS/JS: @lecourtv

## License:
This project is licensed under the MIT license, except for the different JS scripts found in `public`.

## Notes:
Some files may be missing as the project has been heavily stripped

## Getting started: the easy way
You'll need Vagrant and VirtualBox.

```sh
vagrant up
vagrant ssh

# Once you're logged in the vm:
cd Code
./setup.sh
# Accept to download the required libraries (FontAwesome/Knacss)
# When asked to set the DB up, hit enter to use the default config
# Done.
```

Your server will be accessible at [192.168.10.10](http://192.168.10.10)
