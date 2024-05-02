<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		


<center>
<nav class="bg-orange-500 text-white shadow-xl font-sans">
  <div class="justify-items place-content-center max-w-screen-xl flex flex-wrap items-center content-around mx-auto p-4 ">
    <a href="/home" class="flex items-center space-x-3">
        <img src="data:image/png;base64,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" class="h-16" alt="Flowbite Logo" />
        <span class=" text-4xl font-semibold whitespace-nowrap ">PetShare</span>
    </a>
  </div>
</nav>
</center>
    
</head>

<body class="font-sans">

<br>
<br>
  
    @yield('conteudo')

<br>
<br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

<br>

<br>

<footer class="bg-gray-500 text-white ">
  <div class="justify-items max-w-screen-xl items-center content-around mx-auto p-6 sm:pl-72 lg:pl-64 xl:pl-28  ">
    <br>
   
    <a href="https://github.com/DevDaviAraujo" class="flex items-center space-x-3">
        <p class="text-2xl font-semibold">Developed by DevDaviAraújo.</p>
    </a>

    <br>

    <ul class="list-none">
      <p class="text-xl font-semibold pb-2">Contato</p>
      <li class="p-1">
        <a target="_blank" rel="noopener noreferrer" class="inline-flex " href="https://www.linkedin.com/in/davi-ara%C3%BAjo-6b560b196/" >
          <img class="w-10 h-10" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAByElEQVR4nO2ZP0/CQBjG22scXI2Tiauy+glc3MC4+iX8DA6G9IiDJsYBBhdNHJwcNRGIHY3xjoBCgkTEAUP8A63yt7ymBVQEIq2mvSb3JM/UN5fnd+97N1wFgYuLi4tpSTJdQTKJI5lqCFNwxDLVRExjkkyW/xRexAQ7FhoPt4hJ0P7OuxwedS2FSMAygDk2DIRHRhdkGrUOgInqdnDUs0wqNgAYCI6//G8AvkgazgsaaA0dlIIG8+G0twCUggbfFb/XvAWgNfQ+ALWuewtA8XoHfJG0CWF0IpZXYS584y0A5JIFDoA7OzFM43yf3b2G7YsSpEpVqDbb8FprmaO4dvoAk5sJtgEW9jLw+NaEUbosvsPMTopdgOxLHX5TLK+CxCrAuPIf5dgE0Ntgzv/S4S2sHucheqcOrdtPPrMJsK4U+2omQgk4yVUG6jJPNTYBpreTA+ssHmQH6sq1FnsA7R/fe57aSo5d63oH7K6FOADmHTDFRwjzQ0z5LYT4NWpRo24Otyx4+mkR07JlAON9noHgYFjE9MwygPFzwe3gqGsJX/ktA3S6QIJuhxcx2bAV/rMTIRIw3uedPRNENcbG9s5zcXFxCU7pA5Jwntel+S2tAAAAAElFTkSuQmCC">
          <p class="  p-1 text-lg ">LinkedIn</p>
        </a>
      </li>
      <li class="p-1">
        <a target="_blank" rel="noopener noreferrer" class="inline-flex " href="https://github.com/DevDaviAraujo">
          <img class="w-9 h-9 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACVUlEQVR4nO2VS48NURDHGwlCYkEiwyDisbX2iBASO4JgbWPhMSxma+VbIIMJK4mEyISFxCewsRqrsSAypm+d7q7T95r+FyVH5kq/H3cmYjH/5OTe2/dU/aqqz6nyvFX9b6K+7iGWCWJ5SxazhmHdct//PGO51evr7hUD+rGOE+M+McRY0bpFjJ9k5bkZ6N5lQU2M88aCm4DFhYhinBsJSix3XAbdoansWW53zpSWAc3A22bux7orX14/Tg4TLx4ixlQDaMrt64XJ0XTZF2Ld2aLEReequiFTjSg5wazbVXWd+zSMk+75cM+c6sZcQA9bXJni6Q0CPeB1UBjqwRxYXCVrspWJshL2ouRYFzBFyfHia5CblQaG5U3BwMqLLtCUr1cZXywz1ZFafCpk20+OjALOZ00Ws9VRWkR1B6uLvqluzjcVrxLs+m8O7Pu6ZRRwGOq2bKkRV24mxlzhHcc4OwrYRLiYA3+u3swyU3IaP7h72QX6VXWTsfIxd7he14EnSzuSlXetus9S5yMr7wt+WCYrjdw8JUZS2hIZfWI8ClguBwPdl7ZzvwOWK4bxhBiDklaafLe6ozZiY/E0ZXTVsLzMBxBYnMlWCqeI8aOyjzOm25RqnCxo6e4tBIFuNRbPnGOyMGTlbmnAjHvlYISN2f51EuFSaixea2MTBLq/bCyaGBdaQYeiSG4Q45dhfDGM000nW1XXFmZxJNc7QYdyQ9yVN+3Qq1GqPVLnTPNy14gYD4iBJjAxFonxeN7qmLdSmrc65samqq4v+19V17S966vy/qV+A8eDprA2+0WAAAAAAElFTkSuQmCC">
          <p class=" p-1 text-lg ">GitHub</p>
        </a>
      </li>
      <li class="p-1">
        <a role="button" class="inline-flex ">
          <img class="w-9 h-9 " class="focus:scale-95 focus:shadow-md drop-shadow-xl hover:drop-shadow-lg" src="data:image/png;base64,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">
          <p class="  p-1 text-lg ">+55 31 99515-2280</p>
        </a>
      </li>
      <li class="p-1">
        <a role="button" class="inline-flex " >
          <img class="w-9 h-9 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA2ElEQVR4nO3UMUoDQRSA4RA7IR5AiGeQCJ7BCIH0iqVXyBW8gq2lleApBCGdqbNJDmBhp3wSeAvBHdfddUGL/WGYYd689zNvYHq9jn8DzrH2e1YYpwQL7fGSEhziroXijzhKCQYxT+OadVltc3drfRVscBXrfdzgvULhD9ziIHInWKYEhSviGE8lxec43WnxfR4oE2x5wwx76OMarzXiPwpynnES8SEeYgxjbxRnClQVFHpc9Y3qCHIyXOIi1qU0EdSiEzRqUZPv4TuylGDckiTDWUHQ8Wd8Al89seTt51OiAAAAAElFTkSuQmCC">
          <p class=" p-1 text-lg ">dsantosalvesaraujo@gmail.com</p>
        </a>
      </li>
      
    </ul>
  </div>

  <br>
  <br>
</footer>