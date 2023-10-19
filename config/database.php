<?php

function getDatabaseConfig(): array
{
    return [
        "database" => [
            "test" => [
                "url" => "http://localhost:3306;dbname=php_login_management_test",
                "username" => "root",
                "password" => ""
            ],

            "prod" => [
                "url" => "http://localhost:3306;dbname=php_login_management",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
