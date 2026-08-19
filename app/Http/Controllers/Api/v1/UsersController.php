<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {

        $users = [
            ['id' => 1, 'name' => 'Alex', 'email' => 'alex@example.com'],
            ['id' => 2, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 3, 'name' => 'Anna', 'email' => 'anna@example.com'],
            ['id' => 4, 'name' => 'Mike', 'email' => 'mike@example.com'],
            ['id' => 5, 'name' => 'Kate', 'email' => 'kate@example.com'],
            ['id' => 6, 'name' => 'David', 'email' => 'david@example.com'],
            ['id' => 7, 'name' => 'Emma', 'email' => 'emma@example.com'],
            ['id' => 8, 'name' => 'Chris', 'email' => 'chris@example.com'],
            ['id' => 9, 'name' => 'Sophia', 'email' => 'sophia@example.com'],
            ['id' => 10, 'name' => 'Daniel', 'email' => 'daniel@example.com'],
            ['id' => 11, 'name' => 'Olivia', 'email' => 'olivia@example.com'],
            ['id' => 12, 'name' => 'James', 'email' => 'james@example.com'],
            ['id' => 13, 'name' => 'Emily', 'email' => 'emily@example.com'],
            ['id' => 14, 'name' => 'Robert', 'email' => 'robert@example.com'],
            ['id' => 15, 'name' => 'Mia', 'email' => 'mia@example.com'],
            ['id' => 16, 'name' => 'William', 'email' => 'william@example.com'],
            ['id' => 17, 'name' => 'Grace', 'email' => 'grace@example.com'],
            ['id' => 18, 'name' => 'Thomas', 'email' => 'thomas@example.com'],
            ['id' => 19, 'name' => 'Lily', 'email' => 'lily@example.com'],
            ['id' => 20, 'name' => 'George', 'email' => 'george@example.com'],
        ];

        return response()->json([
            'status' => 'success',
            'users' => $users,
        ]);
    }
}
