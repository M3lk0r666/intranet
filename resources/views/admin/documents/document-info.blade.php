<div class="flex items-start space-x-3">
    <div class="flex-shrink-0">
        <div class="h-10 w-10 rounded-lg flex items-center justify-center"
            style="background-color: {{ $categoryColor }}20; border: 1px solid {{ $categoryColor }}30;">
            <i class="{{ $icon }}" style="color: {{ $categoryColor }} text-base"></i>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
            {{ $document->title }}
        </p>
    </div>
</div>
