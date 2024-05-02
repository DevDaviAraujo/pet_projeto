<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <nav class="bg-orange-500 text-white font-sans">
    <div class="justify-items place-content-center max-w-screen-xl flex flex-wrap items-center content-around mx-auto p-4 ">
        <a href="/home" class="flex items-center space-x-3">
            <img class="w-20 h-20" src="data:image/png;base64,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" class="h-16" alt="Flowbite Logo" />
            <span class=" text-5xl font-semibold whitespace-nowrap ">PetShare</span>
        </a>
    </div>
    </nav>
</head>

<body class="bg-orange-500 grid place-content-center text-white">
    
<div class="grid place-content-center pt-80">


    <p class=" text-6xl font-bold ">Error - 404</p>
    

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>