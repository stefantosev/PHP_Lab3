<?php

//    session_start();
//
//    require "../jwt_helper.php";
//
//    if(!isset($_SESSION['jwt']) && !decodeJWT($_SESSION['jwt'])){
//        header('Location: auth/login_pages.php');
//        exit;
//    }

    include '../database/db_connection.php';

    if(isset($_GET["id"])){
        $id = intval($_GET["id"]);

        $db = database_connect();

        $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindValue(":id", $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $p = $result->fetchArray(SQLITE3_ASSOC);
        $db->close();
    }else{
        die("Invalid ID");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | UPDATE</title>
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
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Update the product</h2>
        <form class="space-y-6" action="../handlers/update_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($p['id']) ?>">
            <div class="space-y-2">
                <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($p['name']) ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="space-y-2">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="space-y-2">
                <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" min="0" step="0.01" required value="<?php echo htmlspecialchars($p['price']) ?>"
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





