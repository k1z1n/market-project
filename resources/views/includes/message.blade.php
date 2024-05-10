@if(session('error'))
    <div id="error-message"
         class="fixed z-[1000] top-6 right-2.5 px-4 py-2 bg-red-600 text-white rounded-2xl">
        {{ session('error') }}
    </div>
@endif

@if(session('message'))
    <div id="message"
         class="fixed z-[1000] top-24 right-2.5 px-4 py-2 bg-green-500 text-white rounded-2xl">
        {{ session('message') }}
    </div>
@endif

<script>
    const errorMessage = document.getElementById('error-message');
    const message = document.getElementById('message');

    if (errorMessage) {
        setTimeout(() => {
            errorMessage.classList.add('invisible');
        }, 3000);
    }

    if (message) {
        setTimeout(() => {
            message.classList.add('invisible');
        }, 3000);
    }
</script>
