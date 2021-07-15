## Setting Up the Project

### Quick start ###

- git clone 
- Install [Composer](https://getcomposer.org/). 
- Install [npm](https://docs.npmjs.com/).
- Copy the env.sample and rename it to .env
- Run the series of commands below in you command line:

    ```shell
    composer install
    php artisan key:generate
    ```
    
- Setup the env file with database credentials, then execute:

    ```shell
    php artisan migrate --seed
    ```

## Login Credentials

- **email**: any email in the users table
- **password**: `password`
