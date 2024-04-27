<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code Scanner</title>
    <script src="{{ asset('assets/js/scanner/html5-qrcode.min.js') }}"></script>
</head>

<body>
    <div class="row">
        <div class="col">
            <div style="width:600px;" id="reader"></div>
        </div>
        <div class="col" style="padding:30px;">
            <h4>SCAN RESULT</h4>
            <div id="result">Result Here</div>
            <div id="attendeeInfo" style="margin-top: 4rem;">
                <h2>Attendee Information</h2>
            </div>
        </div>
    </div>

    <!-- Add audio element for success sound -->
    <audio id="successSound">
        <source src="{{asset('assets/audio/scan-sound.mp3')}}" type="audio/mpeg">
    </audio>
</body>

</html>

<style>
    .result {
        background-color: green;
        color: #fff;
        padding: 20px;
    }

    .row {
        display: flex;
    }
</style>

<script type="text/javascript">
    // Get the event ID from the URL query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const eventId = urlParams.get('event_id');

    // Variable to track if scanner is enabled
    let scannerEnabled = true;

    function onScanSuccess(qrCodeMessage) {
        if (!scannerEnabled) return; // Exit if scanner is disabled

        document.getElementById('result').innerHTML = '<span class="result">' + 'Unique Code: ' + qrCodeMessage +
            '</span>';

        // Disable scanner temporarily
        scannerEnabled = false;

        // Play success sound
        document.getElementById('successSound').play();

        // Send AJAX request to server
        fetch('/event-attendees', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    qr_code: qrCodeMessage,
                    event_id: eventId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    //handle nulls
                    if (data.attendee.occupational_status === 'student') {
                        data.attendee.work_specialization = "N/A";
                        data.attendee.employer = "N/A";
                    } else {
                        data.school_name = "N/A";
                    }

                    // Display attendee information
                    document.getElementById('attendeeInfo').innerHTML = `
                    <p>Type of Attendee: ${data.attendee.type}</p>
                    <p>First Name: ${data.attendee.fname}</p>
                    <p>Last Name: ${data.attendee.lname}</p>
                    <p>Birthdate: ${data.attendee.birth_date}</p>
                    <p>Country: ${data.attendee.country}</p>
                    <p>Occupational Status: ${data.attendee.occupational_status}</p>
                    <p>School Name: ${data.attendee.school_name}</p>
                    <p>Employer: ${data.attendee.employer}</p>
                    <p>Work Specialization: ${data.attendee.work_specialization}</p>
                `;
                } else {
                    document.getElementById('attendeeInfo').innerHTML = `${data.message}`;
                }
            })
            .catch(error => {
                console.error('Error:', JSON.stringify(error));
            })
            .finally(() => {
                // Enable scanner after 5 seconds
                setTimeout(() => {
                    scannerEnabled = true;
                }, 2500);
            });
    }

    function onScanError(errorMessage) {
        // Handle scan error
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
