<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Login Page
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
   <div class="flex justify-center mb-4">
    <img alt="Logo" class="h-12 w-12" height="50" src="https://storage.googleapis.com/a1aa/image/d22vYlrXYa7LCVy21y4fpppMsZBZXc9aU4QQSSJbtlnpMZ7JA.jpg" width="50"/>
   </div>
   <h2 class="text-center text-2xl font-semibold mb-6">
    Login into Admin Dashboard
   </h2>
   <form>
    <div class="mb-4">
     <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
      EMAIL ADDRESS
     </label>
     <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Email Address" type="email"/>
    </div>
    <div class="mb-4 relative">
     <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
      PASSWORD
     </label>
     <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" placeholder="Password" type="password"/>
     <i class="fas fa-eye absolute right-3 top-10 text-gray-500 cursor-pointer">
     </i>
    </div>
    <div class="mb-4 flex items-center">
     <input class="mr-2 leading-tight" id="remember" type="checkbox"/>
     <label class="text-sm text-gray-700" for="remember">
      Remember Me
     </label>
    </div>
    <div class="flex items-center justify-between">
     <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
      Login
     </button>
    
    </div>
   </form>
  </div>
 </body>
</html>
