# slim2app
A Slim 2 Framework skeleton application was built for Composer and makes setting up a new application quick and easy.

## Install the Application
Run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project lvis/slim2app [app-name]

* Replace <code>[app-name]</code> with the desired directory name for your new application.
* Ensure `logs/` and `templates/cache` are web writeable.

You can run application in development with this command:

    php composer.phar start
