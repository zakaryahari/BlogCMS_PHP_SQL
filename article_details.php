<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Article Details - BlogCMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="assets/js/init-alpine.js"></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    
    <nav class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="index.php">
                BlogCMS
            </a>
            
            <ul class="flex items-center flex-shrink-0 space-x-6">
                
                <li class="flex">
                    <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                        <template x-if="!dark"><svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg></template>
                        <template x-if="dark"><svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg></template>
                    </button>
                </li>

                <li class="relative">
                    <a href="pages/login.php" class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline">Login</a>
                </li>
                <li class="relative">
                    <a href="pages/signup.php" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Create Account
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container px-6 py-8 mx-auto">
        
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 overflow-hidden">
            
            <img class="object-cover w-full h-64 md:h-96" src="assets/img/default.png" alt="Article Image">
            
            <div class="p-6 md:p-10">
                <div class="flex items-center justify-between mb-4">
                    <span class="px-3 py-1 text-sm font-bold text-purple-600 uppercase bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-600">
                        Technology
                    </span>
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        December 10, 2024 • by AuthorName
                    </span>
                </div>

                <h1 class="mb-6 text-3xl font-bold text-gray-900 dark:text-gray-100">
                    The Future of Artificial Intelligence
                </h1>

                <div class="prose max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                    <p class="mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <p class="mb-4">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-10">
            <h3 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Comments</h3>

            <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 mb-8">
                <h4 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Leave a comment
                </h4>
                
                <form action="article_details.php" method="POST">
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-700 dark:text-gray-400 mb-1">Your Name</label>
                        <input type="text" name="guest_name" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline-purple dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" placeholder="John Doe" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-700 dark:text-gray-400 mb-1">Message</label>
                        <textarea name="contenu_commentaire" rows="3" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:shadow-outline-purple dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" placeholder="Write your thoughts here..." required></textarea>
                    </div>

                    <button type="submit" name="submit_comment" class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Post Comment
                    </button>
                </form>
            </div>

            <div class="space-y-6">
                
                <div class="bg-white p-6 rounded-lg shadow-sm dark:bg-gray-800 border-l-4 border-purple-600">
                    <div class="flex items-center justify-between mb-2">
                        <h5 class="font-semibold text-gray-800 dark:text-gray-200">
                            Alice Wonder
                        </h5>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            Dec 12, 2024
                        </span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        This is a fantastic article! I really learned a lot about the topic. Thanks for sharing.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm dark:bg-gray-800 border-l-4 border-purple-600">
                    <div class="flex items-center justify-between mb-2">
                        <h5 class="font-semibold text-gray-800 dark:text-gray-200">
                            Bob The Builder
                        </h5>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            Dec 11, 2024
                        </span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        I have a question about the second paragraph. Can you elaborate on the specific tools mentioned?
                    </p>
                </div>

            </div>

        </div>

    </div>

    <footer class="py-10 mt-10 bg-white dark:bg-gray-800 border-t dark:border-gray-700">
        <div class="container px-6 mx-auto text-center text-gray-600 dark:text-gray-400">
            &copy; 2024 BlogCMS. Built with ❤️ using PHP & Tailwind.
        </div>
    </footer>

</body>
</html>