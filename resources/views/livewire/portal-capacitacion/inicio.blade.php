<div class="max-w-6xl mx-auto px-6 font-sans">
    <!-- Hero Section con Fondo Mejorado -->
    <div class="relative text-center py-24 md:py-32 overflow-hidden animate-fade-in [animation-duration:1.5s]">
        <!-- Fondo con gradiente y patrón sutil -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50 opacity-90 z-0">
            <div class="absolute inset-0 opacity-20 bg-[url('https://img.freepik.com/free-vector/gradient-network-connection-background_23-2148881320.jpg')] bg-cover bg-center"></div>
        </div>
        
        <!-- Contenido sobre el fondo -->
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-6 leading-tight transform transition-all duration-700 hover:scale-105">
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">La herramienta clave</span><br>
                para el desarrollo de tu equipo
            </h1>
            
            <!-- Texto destacado con fondo y animación -->
            <div class="inline-block bg-white/80 backdrop-blur-sm rounded-xl px-6 py-4 shadow-lg mb-8 animate-float [animation-duration:4s] [animation-iteration-count:infinite]">
                <p class="text-lg md:text-xl text-gray-700 font-medium">
                    Optimiza la gestión de talento en tu empresa con nuestra plataforma integral
                </p>
            </div>
            
            <!-- Lista con transiciones escalonadas -->
            <ul class="text-left mx-auto max-w-2xl space-y-3">
                <li class="flex items-start gap-3 text-gray-700 transition-all duration-500 hover:translate-x-2 [animation-delay:100ms] animate-list-item">
                    <span class="bg-green-100 p-1 rounded-full text-green-600">✓</span>
                    <span>Crea y asigna perfiles de puesto según las necesidades de tu organización.</span>
                </li>
                <li class="flex items-start gap-3 text-gray-700 transition-all duration-500 hover:translate-x-2 [animation-delay:200ms] animate-list-item">
                    <span class="bg-blue-100 p-1 rounded-full text-blue-600">🔍</span>
                    <span>Compara perfiles de puesto para detectar brechas de habilidades.</span>
                </li>
                <li class="flex items-start gap-3 text-gray-700 transition-all duration-500 hover:translate-x-2 [animation-delay:300ms] animate-list-item">
                    <span class="bg-purple-100 p-1 rounded-full text-purple-600">📚</span>
                    <span>Diseña y gestiona capacitaciones, asegurando un aprendizaje efectivo.</span>
                </li>
                <li class="flex items-start gap-3 text-gray-700 transition-all duration-500 hover:translate-x-2 [animation-delay:400ms] animate-list-item">
                    <span class="bg-orange-100 p-1 rounded-full text-orange-600">🎯</span>
                    <span>Crea cursos y temáticas personalizadas para cada puesto.</span>
                </li>
                <li class="flex items-start gap-3 text-gray-700 transition-all duration-500 hover:translate-x-2 [animation-delay:500ms] animate-list-item">
                    <span class="bg-red-100 p-1 rounded-full text-red-600">📈</span>
                    <span>Mejora la productividad y retención del talento con formación estratégica.</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Video Section con Efecto Parallax -->
    <div class="flex justify-center my-12 md:my-24 animate-slide-in [animation-duration:1s]">
        <div class="relative w-full max-w-4xl cursor-pointer group" onclick="openVideo()">
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-1000 group-hover:shadow-3xl">
                <div class="relative h-64 md:h-96 bg-gray-800">
                    <img src="https://www.stelorder.com/wp-content/uploads/2021/09/portada-empresa.jpg" alt="Video institucional" 
                         class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:opacity-80">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="bg-white p-5 rounded-full shadow-lg transform transition-all duration-500 group-hover:scale-110 group-hover:shadow-xl animate-pulse-slow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
            <div class="absolute bottom-6 left-6 bg-white text-blue-600 px-4 py-2 rounded-lg text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                Ver video explicativo
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="videoModal" class="fixed inset-0 bg-black/95 flex items-center justify-center hidden z-50 backdrop-blur-sm">
        <div class="relative w-full max-w-4xl xl:max-w-5xl animate-modal-in [animation-duration:0.4s]">
            <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden shadow-3xl">
                <iframe id="youtubeVideo" class="w-full h-auto min-h-[300px] md:min-h-[500px]" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <button onclick="closeVideo()" class="absolute -top-12 right-0 bg-red-500 text-white p-3 rounded-full shadow-lg hover:bg-red-600 transition-all duration-300 transform hover:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Beneficios con Efecto Mosaico -->
    <section class="py-16 px-6 text-center animate-fade-in [animation-duration:1.5s]">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4 animate-typing [animation-duration:3s]">
                ¿Por qué elegirnos?
            </h2>
            <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto animate-fade-in [animation-delay:0.5s]">
                Descubre cómo transformamos la capacitación empresarial con soluciones innovadoras
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-700 transform hover:-translate-y-3 group animate-card [animation-delay:0.1s]">
                <div class="relative overflow-hidden rounded-full w-20 h-20 mx-auto mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-blue-300 transition-all duration-700 group-hover:rotate-12"></div>
                    <span class="relative flex items-center justify-center h-full text-3xl text-blue-600">📚</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Variedad de capacitaciones</h3>
                <p class="text-gray-600 transition-all duration-500 group-hover:text-gray-800">
                    Accede a una amplia oferta de cursos y temáticas personalizadas para cada perfil de puesto.
                </p>
            </div>
            
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-700 transform hover:-translate-y-3 group animate-card [animation-delay:0.2s]">
                <div class="relative overflow-hidden rounded-full w-20 h-20 mx-auto mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-100 to-green-300 transition-all duration-700 group-hover:rotate-12"></div>
                    <span class="relative flex items-center justify-center h-full text-3xl text-green-600">👨‍🏫</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Instructores especializados</h3>
                <p class="text-gray-600 transition-all duration-500 group-hover:text-gray-800">
                    Capacitación impartida por expertos en cada área, garantizando formación de alta calidad.
                </p>
            </div>
            
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-700 transform hover:-translate-y-3 group animate-card [animation-delay:0.3s]">
                <div class="relative overflow-hidden rounded-full w-20 h-20 mx-auto mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-100 to-yellow-300 transition-all duration-700 group-hover:rotate-12"></div>
                    <span class="relative flex items-center justify-center h-full text-3xl text-yellow-600">🎓</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Certificación oficial</h3>
                <p class="text-gray-600 transition-all duration-500 group-hover:text-gray-800">
                    Emite certificados y reconocimientos oficiales DC3 alineados con normativas.
                </p>
            </div>
            
            <div class="p-6 bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-700 transform hover:-translate-y-3 group animate-card [animation-delay:0.4s]">
                <div class="relative overflow-hidden rounded-full w-20 h-20 mx-auto mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-100 to-purple-300 transition-all duration-700 group-hover:rotate-12"></div>
                    <span class="relative flex items-center justify-center h-full text-3xl text-purple-600">🚀</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Acceso 100% flexible</h3>
                <p class="text-gray-600 transition-all duration-500 group-hover:text-gray-800">
                    Capacita a tu equipo desde cualquier dispositivo, en cualquier momento.
                </p>
            </div>
        </div>
    </section>

    <!-- Carrusel de Clientes con Efecto 3D -->
    <section class="py-16 bg-gradient-to-r from-gray-50 to-blue-50 text-center animate-fade-in [animation-duration:1.5s]">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">
                Hemos impulsado a <span class="text-blue-600 animate-pulse-slow">+300 equipos</span> de alto rendimiento
            </h2>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
                Empresas líderes confían en nuestras soluciones para el desarrollo de su talento
            </p>
            
            <div class="relative max-w-6xl mx-auto overflow-hidden py-8">
                <div class="flex animate-infinite-scroll [animation-duration:40s] items-center justify-center gap-16">
                    <!-- Logos con efecto 3D al hover -->
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://imagenes.elpais.com/resizer/v2/Y3W6QUFBBZLLTALRW6NBRPZ2RA.jpg?auth=d68f18251117888479d8fdc3210796bc86d9d3f41719da72c2877bcafc3504ea&width=1960&height=1103&smart=true" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Nike">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://webslima.net/wp-content/uploads/logotipo-constructora-cemex.jpg" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Cemex">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://media.istockphoto.com/id/1420172793/es/vector/logotipo-de-conexi%C3%B3n-business-global-technology-and-network.jpg?s=612x612&w=0&k=20&c=9vMRUd52idS8PWUl3sPr3yEFh-GneGkJVDcEFZDXli0=" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Global Tech">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://www.shutterstock.com/image-vector/logo-design-moon-connectioncirclecrescentnightdreamconnectioncircuittechnologycableinternetlogo-vectorsymbolideacreative-260nw-2524246751.jpg" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Moon Connection">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://media.istockphoto.com/id/1331491686/es/vector/dise%C3%B1o-de-elementos.jpg?s=612x612&w=0&k=20&c=zmg79X_NSr0bbyKPO987o2hPg7pYML1g5dpHOuT_1Cs=" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Elements">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://eserrano.com/wp-content/images/custom-chocolate-logo.png" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Chocolate">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://eserrano.com/wp-content/images/global-marketing-logo.png" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Global Marketing">
                    </div>
                    
                    <!-- Duplicados para efecto de scroll infinito -->
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://imagenes.elpais.com/resizer/v2/Y3W6QUFBBZLLTALRW6NBRPZ2RA.jpg?auth=d68f18251117888479d8fdc3210796bc86d9d3f41719da72c2877bcafc3504ea&width=1960&height=1103&smart=true" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Nike">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://webslima.net/wp-content/uploads/logotipo-constructora-cemex.jpg" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Cemex">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://media.istockphoto.com/id/1420172793/es/vector/logotipo-de-conexi%C3%B3n-business-global-technology-and-network.jpg?s=612x612&w=0&k=20&c=9vMRUd52idS8PWUl3sPr3yEFh-GneGkJVDcEFZDXli0=" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Global Tech">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://www.shutterstock.com/image-vector/logo-design-moon-connectioncirclecrescentnightdreamconnectioncircuittechnologycableinternetlogo-vectorsymbolideacreative-260nw-2524246751.jpg" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Moon Connection">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://media.istockphoto.com/id/1331491686/es/vector/dise%C3%B1o-de-elementos.jpg?s=612x612&w=0&k=20&c=zmg79X_NSr0bbyKPO987o2hPg7pYML1g5dpHOuT_1Cs=" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Elements">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://eserrano.com/wp-content/images/custom-chocolate-logo.png" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Chocolate">
                    </div>
                    <div class="flex-shrink-0 transition-all duration-700 hover:scale-110 hover:drop-shadow-lg">
                        <img src="https://eserrano.com/wp-content/images/global-marketing-logo.png" 
                             class="h-20 opacity-80 hover:opacity-100 transition-all duration-300 hover:-translate-y-1" 
                             alt="Global Marketing">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section con Acordeón Animado -->
    <section class="py-16 px-6 text-center animate-fade-in [animation-duration:1.5s]">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-10 text-gray-800">
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Portal de Capacitación</span><br>
                Formación Estratégica y Gestión Inteligente
            </h2>
            
            <div class="max-w-3xl mx-auto space-y-4 text-left">
                <div class="feature-card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden group">
                    <div class="flex items-start gap-4 p-5 cursor-pointer" onclick="toggleFeature(this)">
                        <div class="bg-blue-100 p-3 rounded-full group-hover:bg-blue-200 transition-colors duration-500 flex-shrink-0">
                            <span class="text-blue-600 text-xl">🚀</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">Aprendizaje a la medida</h3>
                            <div class="feature-content transition-all duration-500 overflow-hidden max-h-0">
                                <p class="text-gray-600 pt-2">Diseña capacitaciones adaptadas a cada puesto y necesidad empresarial con nuestra plataforma intuitiva.</p>
                            </div>
                        </div>
                        <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden group">
                    <div class="flex items-start gap-4 p-5 cursor-pointer" onclick="toggleFeature(this)">
                        <div class="bg-purple-100 p-3 rounded-full group-hover:bg-purple-200 transition-colors duration-500 flex-shrink-0">
                            <span class="text-purple-600 text-xl">📊</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">Reportes en tiempo real</h3>
                            <div class="feature-content transition-all duration-500 overflow-hidden max-h-0">
                                <p class="text-gray-600 pt-2">Descarga reportes detallados sobre evaluaciones y desempeño con análisis avanzados y exportables.</p>
                            </div>
                        </div>
                        <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden group">
                    <div class="flex items-start gap-4 p-5 cursor-pointer" onclick="toggleFeature(this)">
                        <div class="bg-green-100 p-3 rounded-full group-hover:bg-green-200 transition-colors duration-500 flex-shrink-0">
                            <span class="text-green-600 text-xl">⏳</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">Capacita en minutos</h3>
                            <div class="feature-content transition-all duration-500 overflow-hidden max-h-0">
                                <p class="text-gray-600 pt-2">Crea cursos fácilmente con nuestras plantillas inteligentes y mejora el aprendizaje continuo de tu equipo.</p>
                            </div>
                        </div>
                        <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden group">
                    <div class="flex items-start gap-4 p-5 cursor-pointer" onclick="toggleFeature(this)">
                        <div class="bg-yellow-100 p-3 rounded-full group-hover:bg-yellow-200 transition-colors duration-500 flex-shrink-0">
                            <span class="text-yellow-600 text-xl">📂</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">Certificaciones automáticas</h3>
                            <div class="feature-content transition-all duration-500 overflow-hidden max-h-0">
                                <p class="text-gray-600 pt-2">Facilita la entrega de constancias y reconocimientos con nuestra generación automática de certificados.</p>
                            </div>
                        </div>
                        <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden group">
                    <div class="flex items-start gap-4 p-5 cursor-pointer" onclick="toggleFeature(this)">
                        <div class="bg-red-100 p-3 rounded-full group-hover:bg-red-200 transition-colors duration-500 flex-shrink-0">
                            <span class="text-red-600 text-xl">🔄</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">Automatización del aprendizaje</h3>
                            <div class="feature-content transition-all duration-500 overflow-hidden max-h-0">
                                <p class="text-gray-600 pt-2">Agiliza el onboarding y mantiene al equipo alineado con flujos de aprendizaje automatizados.</p>
                            </div>
                        </div>
                        <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-500 overflow-hidden group">
                    <div class="flex items-start gap-4 p-5 cursor-pointer" onclick="toggleFeature(this)">
                        <div class="bg-indigo-100 p-3 rounded-full group-hover:bg-indigo-200 transition-colors duration-500 flex-shrink-0">
                            <span class="text-indigo-600 text-xl">🏆</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-lg text-gray-800">Desarrollo basado en competencias</h3>
                            <div class="feature-content transition-all duration-500 overflow-hidden max-h-0">
                                <p class="text-gray-600 pt-2">Gestiona competencias específicas para cada puesto con nuestro sistema de evaluación integral.</p>
                            </div>
                        </div>
                        <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section con Efecto de Olas -->
    <section class="relative py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-center animate-fade-in [animation-duration:1.5s] overflow-hidden">
        <!-- Efecto de olas decorativas -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden">
            <svg class="w-full h-20" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" 
                      opacity=".25" class="fill-white"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" 
                      opacity=".5" class="fill-white"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" 
                      class="fill-white"></path>
            </svg>
        </div>
        
        <div class="relative z-10 max-w-2xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 transform transition-all duration-700 hover:scale-105">
                ¿Listo para transformar la capacitación en tu empresa?
            </h2>
            <p class="text-blue-100 mb-8 text-lg md:text-xl">
                Únete a las empresas líderes que ya están revolucionando su capacitación corporativa
            </p>
        </div>
    </section>


    <style>
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slide-in {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes modal-in {
            from { transform: scale(0.8) translateY(20px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }
        
        @keyframes infinite-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes list-item {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes card {
            from { opacity: 0; transform: translateY(30px) rotate(2deg); }
            to { opacity: 1; transform: translateY(0) rotate(0); }
        }
        
        .animate-fade-in {
            animation: fade-in 1.5s ease-out forwards;
        }
        
        .animate-slide-in {
            animation: slide-in 1s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        
        .animate-modal-in {
            animation: modal-in 0.4s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        
        .animate-infinite-scroll {
            animation: infinite-scroll 40s linear infinite;
            display: flex;
            width: 200%;
        }
        
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
        
        .animate-typing {
            overflow: hidden;
            white-space: nowrap;
            animation: typing 3s steps(40) 1s 1 normal both;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }
        
        .animate-bounce-slow {
            animation: bounce-slow 3s ease-in-out infinite;
        }
        
        .animate-list-item {
            animation: list-item 0.6s ease-out forwards;
        }
        
        .animate-card {
            animation: card 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        
        /* Smooth scrolling for the page */
        html {
            scroll-behavior: smooth;
        }
        
        /* Feature card animation */
        .feature-card.active .feature-content {
            max-height: 200px;
            padding-bottom: 1rem;
        }
        
        .feature-card.active svg {
            transform: rotate(180deg);
        }
    </style>

</div>

    <script>
        function openVideo() {
            document.getElementById('youtubeVideo').src = "https://www.youtube.com/embed/Ycs7gq_fRcA?autoplay=1";
            document.getElementById('videoModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeVideo() {
            document.getElementById('youtubeVideo').src = "";
            document.getElementById('videoModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Close modal when clicking outside the video
        document.getElementById('videoModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeVideo();
            }
        });
        
        // Feature toggle functionality
        function toggleFeature(element) {
            const featureCard = element.closest('.feature-card');
            const content = element.querySelector('.feature-content');
            const isActive = featureCard.classList.contains('active');
            
            // Close all other feature cards
            document.querySelectorAll('.feature-card').forEach(card => {
                if (card !== featureCard) {
                    card.classList.remove('active');
                    card.querySelector('.feature-content').style.maxHeight = '0';
                    card.querySelector('svg').style.transform = 'rotate(0)';
                }
            });
            
            // Toggle current feature
            if (!isActive) {
                featureCard.classList.add('active');
                content.style.maxHeight = content.scrollHeight + 'px';
                element.querySelector('svg').style.transform = 'rotate(180deg)';
            } else {
                featureCard.classList.remove('active');
                content.style.maxHeight = '0';
                element.querySelector('svg').style.transform = 'rotate(0)';
            }
        }
        
        // Initialize first feature as open
        document.addEventListener('DOMContentLoaded', function() {
            const firstFeature = document.querySelector('.feature-card');
            if (firstFeature) {
                firstFeature.classList.add('active');
                const content = firstFeature.querySelector('.feature-content');
                content.style.maxHeight = content.scrollHeight + 'px';
                firstFeature.querySelector('svg').style.transform = 'rotate(180deg)';
            }
        });
    </script>