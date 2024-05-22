// Get the event ID from the URL query parameters
const urlParams = new URLSearchParams(window.location.search);
const eventId = urlParams.get('event_id');

// Variable to track if scanner is enabled
let scannerEnabled = true;

//function that renders the attendee data
function renderAttendeeInfo(data, qrCodeMessage) {
    let checkinDateTime = new Date(data.attendee.checkin);

    // Format the datetime with date and AM/PM indication
    let formattedCheckinDateTime = checkinDateTime.toLocaleString([], {
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
                <p class="card-text"><span class="fw-bold">Type of Checkin: ${formattedCheckinDateTime} </span></p>
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
    //  document.getElementById('attendeeInfo').innerHTML = '';
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
                                <p class="card-text"><span class="fw-bold">Type of Checkin: </span>NA</p>
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
    fetch('/event-attendees/checkin', {
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
            console.log(error);
            console.error('Error:', error);
        })
        .finally(() => {
            // Enable scanner after 5 seconds
            setTimeout(() => {
                scannerEnabled = true;
            }, 1500);
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