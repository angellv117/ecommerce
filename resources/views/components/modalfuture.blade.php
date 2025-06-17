@props(['id' => 'modal-default', 'title' => ''])

<div id="{{ $id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center transition-opacity duration-300">
  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 sm:mx-auto transform scale-95 transition-all duration-300">
    
    <!-- Header -->
    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
      <h2 class="text-xl font-semibold text-gray-900">{{ $title }}</h2>
      <button onclick="closeModal('{{ $id }}')" class="text-gray-400 hover:text-red-500 transition-colors text-2xl font-light leading-none">
        &times;
      </button>
    </div>

    <!-- Content -->
    <div class="p-6 text-gray-700 space-y-4">
      {{ $slot }}
    </div>

    <!-- Footer -->
    <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-2">
      <button onclick="closeModal('{{ $id }}')" class="px-4 py-2 text-sm font-medium rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
        Cerrar
      </button>
    </div>
  </div>
</div>

<!-- Script -->
<script>
  function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('hidden');
    setTimeout(() => modal.classList.add('scale-100'), 10);
  }

  function closeModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('scale-100');
    setTimeout(() => modal.classList.add('hidden'), 200);
  }
</script>
