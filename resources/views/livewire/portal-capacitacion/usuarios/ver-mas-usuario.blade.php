<!-- component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
<body>
    <div class="h-full bg-gray-200 p-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile.jpg" class="w-40 border-4 border-white rounded-full">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl">Amanda Ross</p>
                    <span class="bg-blue-500 rounded-full p-1" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </div>
                <p class="text-gray-700">Senior Software Engineer at Tailwind CSS</p>
                <p class="text-sm text-gray-500">New York, USA</p>
            </div>
            <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                        </svg>
                        <span>Connect</span>
                    </button>
                    <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Message</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h2 class="text-3xl font-bold text-center text-indigo-700">Nombre del puesto: </h2>
                    <p class="text-gray-600 mt-2">Área:</p>
                    <p class="text-gray-600">Proceso:</p>
                    <p class="text-gray-600">Misión:</p>

                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Funciones Especificas</h3>
                    </div>

                    <p class="text-gray-600">Puesto Reporta:</p>
                    <p class="text-gray-600">Puestos que le reportan:</p>
                    <p class="text-gray-600">Suplencia:</p>

                    <!-- Relaciones Internas -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Relaciones Internas</h3>
                    </div>

                    <!-- Relaciones Externas -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Relaciones Externas</h3>
                    </div>

                    <p class="text-gray-600">Rango toma de desiciones:</p>
                    <p class="text-gray-600">Decisiones directas:</p>

                    <!-- Responsabilidades Universales -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Responsabilidades Universales</h3>
                        
                    </div>

                    <p class="text-gray-600">Rango edad deseable:</p>
                    <p class="text-gray-600">Sexo preferente:</p>
                    <p class="text-gray-600">Estado civil deseable:</p>
                    <p class="text-gray-600">Escolaridad:</p>
                    <p class="text-gray-600">Idioma requerido:</p>
                    <p class="text-gray-600">Experiencia Requerida:</p>
                    <p class="text-gray-600">Nivel riesgo fisico:</p>
                    
                    <!-- Formación Habilidad Humana -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Humana</h3>
                        
                    </div>

                    <!-- Formación Habilidad Técnica -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-indigo-600">Formación Habilidad Técnica</h3>
                        
                    </div>

                    <p class="text-gray-600">
                        Estado:    
                    </p>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Activity log</h4>
                    <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Profile informations changed.</p>
                                <p class="text-xs text-gray-500">3 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Connected with <a href="#" class="text-blue-600 font-bold">Colby Covington</a>.</p>
                                <p class="text-xs text-gray-500">15 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">Invoice <a href="#" class="text-blue-600 font-bold">#4563</a> was created.</p>
                                <p class="text-xs text-gray-500">57 min ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">New order received <a href="#" class="text-blue-600 font-bold">#OR9653</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->

                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-6 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm">
                                    Message received from <a href="#" class="text-blue-600 font-bold">Jane Stillman</a>.</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full 2xl:w-2/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">About</h4>
                    <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt voluptates obcaecati numquam error et ut fugiat asperiores. Sunt nulla ad incidunt laboriosam, laudantium est unde natus cum numquam, neque facere. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, magni odio magnam commodi sunt ipsum eum! Voluptas eveniet aperiam at maxime, iste id dicta autem odio laudantium eligendi commodi distinctio!</p>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Statistics</h4>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-4">
                        <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-indigo-600">Total Revenue</span>
                                <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">7 days</span>
                            </div>
                            <div class="flex items-center justify-between mt-6">
                                <div>
                                    <svg class="w-12 h-12 p-2.5 bg-indigo-400 bg-opacity-20 rounded-full text-indigo-600 border border-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-end">
                                        <span class="text-2xl 2xl:text-3xl font-bold">$8,141</span>
                                        <div class="flex items-center ml-2 mb-1">
                                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                            <span class="font-bold text-sm text-gray-500 ml-0.5">3%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-green-600">New Orders</span>
                                <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">7 days</span>
                            </div>
                            <div class="flex items-center justify-between mt-6">
                                <div>
                                    <svg class="w-12 h-12 p-2.5 bg-green-400 bg-opacity-20 rounded-full text-green-600 border border-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-end">
                                        <span class="text-2xl 2xl:text-3xl font-bold">217</span>
                                        <div class="flex items-center ml-2 mb-1">
                                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                            <span class="font-bold text-sm text-gray-500 ml-0.5">5%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-6 bg-gray-100 border border-gray-300 rounded-lg shadow-xl">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-sm text-blue-600">New Connections</span>
                                <span class="text-xs bg-gray-200 hover:bg-gray-500 text-gray-500 hover:text-gray-200 px-2 py-1 rounded-lg transition duration-200 cursor-default">7 days</span>
                            </div>
                            <div class="flex items-center justify-between mt-6">
                                <div>
                                    <svg class="w-12 h-12 p-2.5 bg-blue-400 bg-opacity-20 rounded-full text-blue-600 border border-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-end">
                                        <span class="text-2xl 2xl:text-3xl font-bold">54</span>
                                        <div class="flex items-center ml-2 mb-1">
                                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                            <span class="font-bold text-sm text-gray-500 ml-0.5">7%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <canvas id="verticalBarChart" style="display: block; box-sizing: border-box; height: 414px; width: 828px;" width="1656" height="828"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-xl p-8">
            <div class="flex items-center justify-between">
                <h4 class="text-xl text-gray-900 font-bold">Connections (532)</h4>
                <a href="#" title="View All">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 gap-8 mt-8">
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection1.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Diane Aguilar</p>
                    <p class="text-xs text-gray-500 text-center">UI/UX Design at Upwork</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection2.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Frances Mather</p>
                    <p class="text-xs text-gray-500 text-center">Software Engineer at Facebook</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection3.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Carlos Friedrich</p>
                    <p class="text-xs text-gray-500 text-center">Front-End Developer at Tailwind CSS</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection4.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Donna Serrano</p>
                    <p class="text-xs text-gray-500 text-center">System Engineer at Tesla</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection5.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Randall Tabron</p>
                    <p class="text-xs text-gray-500 text-center">Software Developer at Upwork</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection6.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">John McCleary</p>
                    <p class="text-xs text-gray-500 text-center">Software Engineer at Laravel</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection7.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Amanda Noble</p>
                    <p class="text-xs text-gray-500 text-center">Graphic Designer at Tailwind CSS</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection8.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Christine Drew</p>
                    <p class="text-xs text-gray-500 text-center">Senior Android Developer at Google</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection9.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Lucas Bell</p>
                    <p class="text-xs text-gray-500 text-center">Creative Writer at Upwork</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection10.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Debra Herring</p>
                    <p class="text-xs text-gray-500 text-center">Co-Founder at Alpine.js</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection11.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Benjamin Farrior</p>
                    <p class="text-xs text-gray-500 text-center">Software Engineer Lead at Microsoft</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection12.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Maria Heal</p>
                    <p class="text-xs text-gray-500 text-center">Linux System Administrator at Twitter</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection13.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Edward Ice</p>
                    <p class="text-xs text-gray-500 text-center">Customer Support at Instagram</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection14.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Jeffery Silver</p>
                    <p class="text-xs text-gray-500 text-center">Software Engineer at Twitter</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection15.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Jennifer Schultz</p>
                    <p class="text-xs text-gray-500 text-center">Project Manager at Google</p>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-800 hover:text-blue-600" title="View Profile">
                    <img src="https://vojislavd.com/ta-template-demo/assets/img/connections/connection16.jpg" class="w-16 rounded-full">
                    <p class="text-center font-bold text-sm mt-1">Joseph Marlatt</p>
                    <p class="text-xs text-gray-500 text-center">Team Lead at Facebook</p>
                </a>
            </div>
        </div>
    </div>

    <script>

            const DATA_SET_VERTICAL_BAR_CHART_1 = [68.106, 26.762, 94.255, 72.021, 74.082, 64.923, 85.565, 32.432, 54.664, 87.654, 43.013, 91.443];

            const labels_vertical_bar_chart = ['January', 'February', 'Mart', 'April', 'May', 'Jun', 'July', 'August', 'September', 'October', 'November', 'December'];

            const dataVerticalBarChart= {
                labels: labels_vertical_bar_chart,
                datasets: [
                    {
                        label: 'Revenue',
                        data: DATA_SET_VERTICAL_BAR_CHART_1,
                        borderColor: 'rgb(54, 162, 235)',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    }
                ]
            };
            const configVerticalBarChart = {
                type: 'bar',
                data: dataVerticalBarChart,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Last 12 Months'
                        }
                    }
                },
            };

            var verticalBarChart = new Chart(
                document.getElementById('verticalBarChart'),
                configVerticalBarChart
            );
        </script>
</body>
</html>