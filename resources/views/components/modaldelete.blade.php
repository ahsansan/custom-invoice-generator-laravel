<div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 z-40 hidden" onclick="closeModal()">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full relative">
        <button class="text-red-600 hover:text-red-800 text-2xl absolute top-0 right-0 mt-2 mr-2" onclick="closeModal()">
            <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
            </svg>
        </button>
        <div class="p-4 border-b">
            <h5 class="text-lg font-semibold" id="confirmationModalLabel">Konfirmasi Hapus</h5>
        </div>
        <div class="p-4">
            Apakah Anda yakin ingin menghapus data ini?
        </div>
        <div class="p-4 border-t flex justify-end space-x-4">
            <button type="button" class="btn btn-secondary bg-gray-300 px-4 py-2 rounded" onclick="closeModal()">Batal</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
            </form>
        </div>
    </div>
</div>
