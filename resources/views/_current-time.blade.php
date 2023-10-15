{{-- <p>{{ \Carbon\Carbon::now()->format('l, g:i A Y') }}</p> --}}

<p id="local-time"></p>

<script>
    // Function to update the local time
    function updateLocalTime() {
        const localTimeElement = document.getElementById('local-time');
        const now = new Date();
        localTimeElement.textContent = now.toLocaleString();
    }

    // Call the function to display the local time initially
    updateLocalTime();

    // Update the local time every second (optional)
    setInterval(updateLocalTime, 1000);
</script>




