<?php 
  require_once 'classes/database.php'; 
  require_once 'classes/user.php';

  if (isset($_POST['submit'])) {
    $connection = new Database();
    $db = $connection->getConnection();

    $user = new user($db);

    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    $check = $user->login($username_input , $password_input);
    
    if ($check == false) {
        echo "Username dosen't exists!";
    } 
    elseif($check != false) {

      session_start();
      $_SESSION['username'] = $check['username'];
      $_SESSION['user_role'] = $check['role'];
      $_SESSION['user_email'] = $check['email'];

      if ($check['role'] == 'admin') {
        echo "hello admin";
        header('Location: /BRIEF-8/admin/dashboard.php');
        exit();
      }
      elseif ($check['role'] == 'author') {
        echo "hello author";
        header('Location: /BRIEF-8/author/dashboard.php');
        exit();
      } 
      else{
        echo "hello user";
        header('Location: index.html');
        exit();
      }
    }

  }
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/BRIEF-8/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/BRIEF-8/assets/js/init-alpine.js"></script>
  </head>
  <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="/BRIEF-8/assets/img/login-office.jpeg" alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="/BRIEF-8/assets/img/login-office-dark.jpeg" alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Login</h1>
              <form action="" method="POST">
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Username</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" type="text" name="username"/>
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Password</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password"/>
                </label>
                <button type="submit" name="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Log in </button>
              </form>
              <!-- You should use a button here, as the anchor is only used for the example  -->
              <!-- <a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="/BRIEF-8/index.html"> Log in </a> -->


              <hr class="my-8" />

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
