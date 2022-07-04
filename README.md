# To run the code
1. Clone the project
2. Open the terminal and point terminal to the project folder
3. hit command in terminal `composer install`
4. make `.env` file from copying the contet fo `.env.example` file
5. Fill your environment variables in `.env` file regarding- swagger, separate mysql database for testing and actual database
6. hit command in terminal `php artisan l5-swagger:generate` this will generate the [http://127.0.0.1:8000/api/documentation](http://127.0.0.1:8000/api/documentation) 
7. hit command in terminal `php artisan serve` this will run embedded server on [http://localhost:8008](Breakdown-EstimationofLaravelTest.pdf)

# TestCases
Testcases are written tests folder hit command  to test all cases `php artisan test`

# Note
1. I breakdown the tasks and estimate them you can look at the file [Breakdown-EstimationofLaravelTest.pdf](Breakdown-EstimationofLaravelTest.pdf)
2. I added client and user over here to make it through different, Unfortunately I could not manage it but still those modules were there
3. I make use of [https://github.com/nWidart/laravel-modules](NWidart/laravel-modules) to develop test in modular structure
4. The repository pattern has been developed by myself

# Thank You, Looking forward 
## Let me if you need more changes in it