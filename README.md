### Article CRUD using Laravel 10 and Vue 3

- [Laravel](https://laravel.com/)
- [Vue 3](https://vuejs.org/)

## Setup Project

### Laravel
- After cloning the repository, run `composer update`.
- Configure your environment variables (`.env` file).
- Start the Laravel development server with `php artisan serve`.

### Vue
- Change directory to `cd frontcrud`.
- Install required packages with `npm install`.
- I'm using CLI, Webpack, Axios, and more.
- Build the Vue app with `npm run dev`.
- Open localhost in your browser and enjoy! (Don't forget to run `php artisan serve` for the Laravel backend).

----------------------------------------------------------------------------------------------------
## Project Overview

This project demonstrates a simple Article CRUD (Create, Read, Update, Delete) application using the Laravel PHP framework for the backend and Vue.js for the frontend. Here are some details about the technologies used:

### Laravel
- Laravel is a powerful and popular PHP web application framework known for its elegant syntax and developer-friendly features.
- In this project, Laravel serves as the backend, handling database interactions, API endpoints, and routing.
- To get started with Laravel, clone this repository and run `composer update` to install the required dependencies.
- Configure your environment variables in the `.env` file, including database settings.
- Start the Laravel development server with `php artisan serve`.

### Vue 3
- Vue.js is a progressive JavaScript framework for building user interfaces.
- The frontend of this project is built with Vue 3, providing a responsive and interactive user interface.
- To work on the Vue app, navigate to the `frontcrud` directory.
- Install the necessary packages with `npm install`, which includes Vue CLI, Webpack, Axios, and more.
- Build the Vue app with `npm run dev` for development or `npm run build` for production.
- Open localhost in your browser to access the Vue app and enjoy the user-friendly interface.

### CLI (Command Line Interface)
- Command Line Interface (CLI) tools are essential for development and automation tasks.
- In this project, the Vue CLI is used for creating and managing Vue.js projects.
- The Laravel Artisan CLI is used for various Laravel-related tasks, such as creating controllers, migrations, and more.
- You can run Laravel Artisan commands using `php artisan <command>` in the project root directory.

### Webpack
- Webpack is a popular JavaScript module bundler used to bundle and optimize project assets.
- It's a fundamental part of the Vue.js development workflow, handling the compilation of JavaScript, CSS, and other assets.
- Webpack simplifies the management of dependencies and assets, ensuring efficient loading of resources in the browser.

### Axios
- Axios is a promise-based HTTP client for making AJAX requests in JavaScript.
- In this project, Axios is used for making HTTP requests from the Vue.js frontend to interact with the Laravel backend API.
- Axios simplifies the process of sending and receiving data between the frontend and backend, enabling seamless communication.

This project combines the power of Laravel and Vue.js to create a modern web application with a robust backend and a responsive frontend. Feel free to explore and modify the code to suit your needs.
