@props(['label', 'name'])

<div class="mt-6 relative">
    <label class="font-medium">{{ $label }}</label>
    <div id="drop-area" class="mt-2 border-2 border-dashed rounded-xl p-8 bg-gray-50 text-center cursor-pointer transition duration-200 relative {{ $errors->has($name) ? 'border-red-500' : 'border-gray-300' }}">
        <div id="upload-icon">
            <p class="text-gray-700 font-medium">Klik atau drag file di sini</p>
            <p class="text-gray-500 text-sm">Gambar, PDF, atau dokumen</p>
        </div>
    </div>

    <div id="preview-container" class="flex flex-row gap-4 mt-2" style="display:none;">
        <img id="preview-thumb" class="w-32 h-32 object-cover rounded-xl border shadow-sm" style="display:none;">
        <div id="preview-icon" class="text-4xl" style="display:none;">📄</div>
        <div class="flex-1">
            <p id="preview-name" class="font-medium"></p>
            <p id="preview-size" class="text-sm text-gray-500"></p>
            <button id="delete-preview" type="button" class="text-red-600 text-sm hover:underline">✕ Hapus File</button>
        </div>
    </div>

    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden" accept="image/*,.pdf,.doc,.docx">
    @error($name)
    <div class="absolute left-0 mt-1 text-red-600 text-sm animate-fadeIn" role="alert">{{ $message }}</div>
    @enderror
</div>
