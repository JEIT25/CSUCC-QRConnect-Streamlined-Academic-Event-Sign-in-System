@extends('layouts.app')
@section('content')
    <script src="{{ asset('assets/js/scanner/html5-qrcode.min.js') }}"></script>
    @extends('layouts.bars')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="border-right: 5px solid #132533;">
                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div id="reader"></div>
                </div>
            </div>
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <h1>SCAN RESULT</h1>
                <div id="message" class="mt-4"></div>
                <div id="attendeeInfo">
                    <h2>Attendee Information</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Add audio element for success sound -->
    <audio id="successSound">
        <source src="{{ asset('assets/audio/scan-sound.mp3') }}" type="audio/mpeg">
    </audio>

    <script type="text/javascript">
        // Get the event ID from the URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('event_id');

        // Variable to track if scanner is enabled
        let scannerEnabled = true;

        //function that renders the attendee data
        function renderAttendeeInfo(data, qrCodeMessage) {
            let checkoutDateTime = new Date(data.attendee.checkout);

            // Format the datetime with date and AM/PM indication
            let formattedCheckoutDateTime = checkoutDateTime.toLocaleString([], {
                year: 'numeric',
                month: 'numeric',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: true
            });


            document.getElementById('attendeeInfo').innerHTML = `
                    <div class="card mt-4 ms-auto me-auto d-flex flex-column align-item-center justify-content-center" style="width: 100%;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Attendee</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Unique Code: ${qrCodeMessage}</span></p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Checkout: ${formattedCheckoutDateTime} </span></p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Type of Attendee:</span> ${data.attendee.type}</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">First Name:</span> ${data.attendee.fname}</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Last Name:</span> ${data.attendee.lname}</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Birthdate:</span> ${data.attendee.birth_date}</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold"> Occupational Status:</span> ${data.attendee.occupational_status}</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">School Name:</span> ${data.attendee.school_name}</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Employer:</span> ${data.attendee.employer}</p>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Work Specialization:</span> ${data.attendee.work_specialization}</p>
                            </li>
                        </ul>
                    </div>
                `;
        }

        //SET TO N/A ALL ATTENDEE INFORMATION
        function flushAttendeeCard() {
            document.getElementById('attendeeInfo').innerHTML = `
                    <div class="card mt-4 ms-auto me-auto d-flex flex-column align-item-center justify-content-center" style="width: 100%;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Attendee</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Unique Code:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Checkout:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Type of Attendee:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">First Name:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Last Name:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Birthdate:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold"> Occupational Status:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">School Name:</span>NA</p>
                            </li>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Employer:</span>NA</p>
                            <li class="list-group-item text-capitalize">
                                <p class="card-text"><span class="fw-bold">Work Specialization:</span>NA</p>
                            </li>
                        </ul>
                    </div>
                `;
        }

        function onScanSuccess(qrCodeMessage) {
            if (!scannerEnabled) return; // Exit if scanner is disabled

            // Disable scanner temporarily
            scannerEnabled = false;

            // Play success sound
            document.getElementById('successSound').play();

            // Send AJAX request to server
            fetch('/event-attendees/checkout', {
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
                        console.log(data.message)

                        let messDiv = document.getElementById('message');

                        messDiv.innerHTML = '';

                        // Create a new div element
                        let innerDiv = document.createElement('div');


                        //remove dnager class styles of mess div
                        messDiv.classList.remove('alert', 'alert-danger', 'd-flex', 'align-items-center');

                        // Add classes to the div
                        messDiv.classList.add('alert', 'alert-success', 'd-flex', 'align-items-center');

                        // Add role attribute to the div
                        messDiv.setAttribute('role', 'alert');

                        innerDiv.innerHTML = `
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" width="24"
                            height="24">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        ${data.message}
                        `;
                        //append innerDiv
                        messDiv.appendChild(innerDiv)

                        //handle nulls
                        if (data.attendee.occupational_status === 'student') {
                            data.attendee.work_specialization = "N/A";
                            data.attendee.employer = "N/A";
                        } else {
                            data.school_name = "N/A";
                        }

                        // Display attendee information
                        renderAttendeeInfo(data, qrCodeMessage);
                    } else {
                        if (data.message == "Attendee not found.") {
                            flushAttendeeCard();
                        }
                        let messDiv = document.getElementById('message');

                        messDiv.innerHTML = '';

                        // Create a new div element
                        let innerDiv = document.createElement('div');


                        //remove the success classes styles from the mess div
                         messDiv.classList.remove('alert', 'alert-success', 'd-flex', 'align-items-center');

                        // Add classes to the div
                        messDiv.classList.add('alert', 'alert-danger', 'd-flex', 'align-items-center');


                        // Add role attribute to the div
                        messDiv.setAttribute('role', 'alert');

                        innerDiv.innerHTML = `
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" width="24"
                            height="24">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        ${data.message}
                        `;
                        //append innerDiv
                        messDiv.appendChild(innerDiv)

                        // Display attendee information
                        renderAttendeeInfo(data, qrCodeMessage);
                    }
                })
                .catch(error => {
                    console.error('Error:', error.message);
                    console.error('Line number:', error.lineNumber);
                    console.log(eventId)
                })
                .finally(() => {
                    // Enable scanner after 5 seconds
                    setTimeout(() => {
                        scannerEnabled = true;
                    }, 2500);
                });
        }

        function onScanError(errorMessage) {
            console.log("error");
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
