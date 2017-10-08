# slim2app
A Slim 2 Framework skeleton application was built for Composer and makes setting up a new application quick and easy.

## Install Composer
If you have not installed Composer, do that now. Install Composer globally in `/usr/local/bin` or you may also install Composer locally in your current working directory. For this tutorial, I assume you have installed Composer locally.

<http://getcomposer.org/doc/00-intro.md#installation>

## Install the Application
After you install Composer, run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project lvis/slim2app [app-name]

* Replace <code>[app-name]</code> with the desired directory name for your new application.
* Ensure `logs/` and `templates/cache` are web writeable.
