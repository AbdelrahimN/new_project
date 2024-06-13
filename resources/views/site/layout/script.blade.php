<script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
<script>
    BackToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };
</script>
<script src="{{ asset('site/js/caresol.js') }}"></script>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b29d5758e9e212a4e470', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('job_manager');
    channel.bind('PusheNotificationr', function(data) {
        alert(JSON.stringify(data));
    });
</script>
