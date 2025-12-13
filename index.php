<?php 
    require_once 'classes/database.php';
    require_once 'classes/article.php';

    $connection = new Database();
    $db = $connection->getconnection();
    
    $article = new article($db);
    $articles = $article->getPublishedArticles();

    session_start();
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BlogCMS - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="assets/js/init-alpine.js"></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    
    <nav class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                BlogCMS
            </a>
            
            <ul class="flex items-center flex-shrink-0 space-x-6">
                
                <li class="flex">
                    <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                        <template x-if="!dark"><svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg></template>
                        <template x-if="dark"><svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg></template>
                    </button>
                </li>

                <?php if(isset($_SESSION['username'])): ?>
                    <?php if($_SESSION['user_role'] == 'admin'): ?>
                        <li class="relative">
                            <a href="admin/dashboard.php" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Admin Panel
                            </a>
                        </li>
                    <?php elseif($_SESSION['user_role'] == 'author'): ?>
                        <li class="relative">
                            <a href="author/dashboard.php" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Author Dashboard
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="relative">
                        <a href="assets/php/logout.php" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">Logout</a>
                    </li>
                    
                    <li class="relative">
                         <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" aria-label="Account" aria-haspopup="true">
                            <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true" />
                        </button>
                    </li>

                <?php else: ?>
                    <li class="relative">
                        <a href="pages/login.php" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">Login</a>
                    </li>
                    <li class="relative">
                        <a href="pages/signup.php" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Create Account
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>

    <div class="bg-purple-600">
        <div class="container px-6 py-16 mx-auto text-center">
            <h1 class="text-3xl font-semibold text-gray-100 dark:text-gray-100">Welcome to BlogCMS</h1>
            <p class="max-w-md mx-auto mt-5 text-gray-300">
                Discover stories, thinking, and expertise from writers on any topic.
            </p>
        </div>
    </div>

    <div class="container px-6 py-8 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Latest Articles
        </h2>

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
            
            <?php foreach($articles as $row): ?>
            <div class="flex flex-col bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="relative w-full h-48">
                    <img class="object-cover w-full h-full rounded-t-lg" src="<?php echo !empty($row['image_url']) ? $row['image_url'] : 'assets/img/default.png'; ?>" alt="Article Image" loading="lazy" />
                </div>
                
                <div class="p-4 flex-grow">
                    <div class="flex items-center justify-between mb-2">
                        <span class="px-2 py-1 text-xs font-bold text-purple-600 uppercase bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-600">
                            <?php echo $row['category_name'] ? $row['category_name'] : 'General'; ?>
                        </span>
                        <span class="text-xs text-gray-600 dark:text-gray-400">
                            <?php echo date('M d, Y', strtotime($row['date_creation'])); ?>
                        </span>
                    </div>

                    <h4 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300 hover:text-purple-600">
                        <a href="article_details.php?id=<?php echo $row['id_article']; ?>">
                            <?php echo $row['nom_article']; ?>
                        </a>
                    </h4>
                    
                    <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        <?php echo substr($row['contenu'], 0, 100) . '...'; ?>
                    </p>
                </div>

                <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            <span><?php echo $row['username']; ?></span>
                        </div>
                        <a href="article_details.php?id=<?php echo $row['id_article']; ?>" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">
                            Read more &rarr;
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <footer class="py-6 bg-white dark:bg-gray-800">
        <div class="container px-6 mx-auto text-center text-gray-600 dark:text-gray-400">
            &copy; 2024 BlogCMS. All rights reserved.
        </div>
    </footer>

</body>
</html>