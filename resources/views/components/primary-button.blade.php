<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-lime-800 focus:ring-lime-600 focus:border-lime-600  border border-transparent ease-in duration-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 focus:bg-lime-700 active:bg-lime-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
