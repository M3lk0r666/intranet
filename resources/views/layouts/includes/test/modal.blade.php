<div id="video-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 modal-overlay">
    <div class="bg-surface-light dark:bg-surface-dark rounded-2xl shadow-2xl w-full max-w-4xl overflow-hidden">
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-800">
            <h3 id="modal-title" class="text-xl font-bold"></h3>
            <button id="close-modal" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="p-6">
            <div class="video-player-container mb-6" id="video-player">
                <!-- Video player se cargará dinámicamente -->
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <h4 class="font-bold text-lg mb-2">Descripción</h4>
                    <p id="modal-description" class="text-text-sub text-sm"></p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span id="modal-category"
                            class="inline-block px-3 py-1 text-xs font-bold rounded-full text-white"></span>
                        <span id="modal-duration"
                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 dark:bg-gray-800 text-text-main dark:text-white"></span>
                        <span id="modal-instructor"
                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 dark:bg-gray-800 text-text-main dark:text-white"></span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <h5 class="font-bold text-sm mb-2">Recursos relacionados</h5>
                        <div id="modal-resources" class="space-y-2">
                            <!-- Recursos se cargarán dinámicamente -->
                        </div>
                    </div>
                    <div>
                        <h5 class="font-bold text-sm mb-2">Acciones</h5>
                        <div class="flex flex-col gap-2">
                            <button id="continue-watching"
                                class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover:bg-opacity-90 transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-base">play_circle</span>
                                <span>Continuar viendo</span>
                            </button>
                            <button id="save-video"
                                class="w-full border border-primary text-primary py-2 rounded-lg font-semibold hover:bg-primary/10 transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-base">bookmark</span>
                                <span>Guardar para después</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
