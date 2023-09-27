<html>
    <body>
        <div class="container-fluid">
            <div class="row">
                <h1 class="py-5">Request received</h1>
            </div>
            <div class="col-12">
                <h4 class="mb-3">
                    Request for role: {{ $info['role'] }}
                </h4>
                <p class="mb-3">Received from: {{ $info['email'] }}</p>
                <h4 class="mb-3">Message: </h4>
                <p class="mb-3">{{ $info['presentation'] }}</p>
            </div>
        </div>
    </body>
</html>