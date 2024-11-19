<?php
//session_start();
//
//require "../jwt_helper.php";
//
//if(!isset($_SESSION['jwt']) && !decodeJWT($_SESSION['jwt'])){
//    header('Location: auth/login_form.php');
//    exit;
//}
//?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | ADD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .animated-bg {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientFlow 15s ease infinite;
        }
    </style>
</head>
<!--<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">-->
<body class="min-h-screen flex items-center justify-center animated-bg p-4">
<div class="relative bg-white p-8 rounded-lg shadow-2xl w-96 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-600 opacity-20"></div>
    <div class="relative z-10">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Add a new Product</h2>
        <form class="space-y-6" action="../handlers/add_products.php" method="post">
            <div class="space-y-2">
                <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="space-y-2">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="space-y-2">
                <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" min="0" step="0.01" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit"
                    class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 ease-in-out transform hover:scale-105">
                Submit
            </button>
        </form>
    </div>
    <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full opacity-20 blur-2xl"></div>
    <div class="absolute -top-16 -right-16 w-64 h-64 bg-gradient-to-br from-green-400 to-cyan-500 rounded-full opacity-20 blur-2xl"></div>
</div>
</body>
</html>
