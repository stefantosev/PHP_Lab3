<?php


include "database/db_connection.php";

//session_start();
//require "jwt_helper.php";
//
//if(!isset($_SESSION['jwt']) || !decodeJWT($_SESSION['jwt'])){
//    header('Location: /pages/auth/login_form.php');
//    exit;
//}

$db = database_connect();

$fetchAll = "SELECT * FROM products";
$result = $db->query($fetchAll);

if(!$result){
    die("Database Connection Failed: " . $db->lastErrorMsg());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
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

<body class="min-h-screen flex items-center justify-center animated-bg p-4">
<div class="relative bg-white bg-opacity-90 backdrop-blur-sm rounded-lg shadow-2xl overflow-hidden max-w-4xl w-full">
    <div class="relative z-10 p-8">
        <a href="pages/add_products_form.php" class="inline-block px-6 py-3 text-lg font-semibold text-white bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full shadow-md hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform hover:scale-105 hover:rotate-1">
            Add new Product
        </a>
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">List Products</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                <tr class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <th class="py-3 px-4 text-left rounded-tl-lg">ID</th>
                    <th class="py-3 px-4 text-left">Name</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Price</th>
                    <th class="py-3 px-4 text-left rounded-tr-lg">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($result): ?>
                    <?php while ( $p = $result->fetchArray(SQLITE3_ASSOC)): ?>
                        <tr class="bg-white hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-4 border-b"><?php  echo htmlspecialchars($p['id'])?></td>
                            <td class="py-4 px-4 border-b"><?php  echo htmlspecialchars($p['name'])?></td>
                            <td class="py-4 px-4 border-b"><?php  echo htmlspecialchars($p['description'])?></td>
                            <td class="py-4 px-4 border-b"><?php  echo htmlspecialchars($p['price']) . " ден."?></td>
                            <td class="py-4 px-4 border-b">
                                <form action="handlers/delete_product.php" method="post" style="display:inline;">
                                     <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                                     <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-full shadow-md hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform hover:scale-105 hover:-rotate-1">Delete</button>
                                </form>
                                <form action="pages/update_product_form.php" method="get" style="display:inline;">
                                     <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                                     <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-full shadow-md hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform hover:scale-105 hover:-rotate-1">Update</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr class="bg-white hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-4 border-b">No products found</td>
                    </tr>
                <?php endif; ?>
            </table>
            <a href="/handlers/auth/logout.php"
               class="inline-block px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-red-500 rounded-full shadow-md hover:from-pink-600 hover:to-red-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-all duration-300 ease-in-out transform hover:scale-105">
                Log out !
            </a>
        </div>
        </div>
    </div>
    <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full opacity-20 blur-2xl"></div>
    <div class="absolute -top-16 -right-16 w-64 h-64 bg-gradient-to-br from-green-400 to-cyan-500 rounded-full opacity-20 blur-2xl"></div>
</div>
</body>
</html>