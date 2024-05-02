
@if ($paginator->hasPages()) 
<nav aria-label="Page navigation example">
  	<ul class="flex items-center -space-x-px h-10 text-lg font-bold">
		@if ($paginator->onFirstPage())  
		<li>
			<a tabindex="-1" href="#" class="flex items-center justify-center  ms-0 leading-tight text-orange-500 bg-white border-2 px-6 h-14 border-orange-500 rounded-s-lg hover:bg-orange-100 hover:text-orange-600 ">
				<span class="sr-only">Previous</span>
				<svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
				</svg>
			</a>
		</li>
		@else  
		<li>
			<a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center px-6 h-14 ms-0 leading-tight text-orange-500 bg-white border-2 border-orange-500 rounded-s-lg hover:bg-orange-100 hover:text-orange-600 ">
				<span class="sr-only">Previous</span>
				<svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
				</svg>
			</a>
		</li>
		@endif 

		@foreach ($elements as $element) 
		@if (is_string($element)) 
		  <li class="page-item disabled"></li> 
		<li>
			<a href="#" class=" disabled flex items-center justify-center px-6 h-14 leading-tight text-orange-500 bg-white border-2 border-orange-500 hover:bg-orange-100 hover:text-orange-600 ">{{ $element }}</a>
		</li>
		@endif 

		@if (is_array($element)) 
		@foreach ($element as $page => $url) 
		@if ($page == $paginator->currentPage()) 
		<li>
			<a href="#" aria-current="page" class="z-10 flex items-center justify-center px-6 h-14 leading-tight text-blue-600 border-2 border-blue-500 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 ">{{ $page }}</a>
		</li>
		@else 
		<li>
			<a href="{{ $url }}" class="flex items-center justify-center px-6 h-14 leading-tight text-orange-500 bg-white border-2 border-orange-500 hover:bg-orange-100 hover:text-orange-600 ">{{ $page }}</a>
		</li>
		@endif 
		@endforeach 
		@endif 
		@endforeach 

		@if ($paginator->hasMorePages()) 

		<li>
			<a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-6 h-14 leading-tight text-orange-500 bg-white border-2 border-orange-500 rounded-e-lg hover:bg-orange-100 hover:text-orange-600 ">
				<span class="sr-only">Next</span>
				<svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
				</svg>
			</a>
		</li>

		@else 
		<li>
			<a href="#" class="flex items-center justify-center px-6 h-14 leading-tight text-orange-500 bg-white border-2 border-orange-500 rounded-e-lg hover:bg-orange-100 hover:text-orange-600 ">
				<span class="sr-only">Next</span>
				<svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
				</svg>
			</a>
		</li> 
		@endif 
	</ul> 
</nav> 
	
@endif 

