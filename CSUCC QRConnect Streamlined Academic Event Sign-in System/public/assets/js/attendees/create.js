// Get the elements
let guestRadio = document.getElementById('guestRadio');
let csuccMemberRadio = document.getElementById('csuccMemberRadio');

let schoolFieldDiv = document.getElementById('schoolField-cont');
let employerFieldDiv = document.getElementById('employerField-cont');
let workSpecialization_fieldDiv = document.getElementById('work_specialization_cont');

let occupationalStatus = document.getElementById('occupational_status');
let schoolField = document.getElementById('schoolField');
let employerField = document.getElementById('employerField');
let workSpecialization_field = document.getElementById('work_specialization');
let otherSpecialization_field = document.getElementById('otherSpec');

showSpecifyInput(document.getElementById('specifyInput'))
function showSpecifyInput(select) {
    //toggle show/hide of other specialization input field
    var specifyInput = document.getElementById('specifyInput');
    if (select.value === 'others') {
        specifyInput.style.display = 'block';
        otherSpecialization_field.required = true;
    } else {
        specifyInput.style.display = 'none';
        otherSpecialization_field.required = false;
    }
}

document.addEventListener('DOMContentLoaded', function () {


    function disableButton() {
        // Disable the button to prevent multiple submissions
        document.getElementById("submitBtn").disabled = true;
    }

    function otherSpecialization_fieldListener() {
        // set value of "others" option to otherSpecialization_field value after done typing
        workSpecialization_field.options[2].value = otherSpecialization_field.value
    }


    function occupationStatus_listener() {
        // Check the selected value , activate listener functions accordingly base on occupational status
        if (occupationalStatus.value === 'student') {
            guestRadio_listener()
            csuccMemberRadio_listener()
        } else if (occupationalStatus.value === 'employed') {
            guestRadio_listener();
            csuccMemberRadio_listener()
        }
    }

    function guestRadio_listener() {
        //if guest radio button is checked
        if (guestRadio.checked) {
            if (occupationalStatus.value === 'student') {
                schoolFieldDiv.style.display = 'block';
                employerFieldDiv.style.display = 'none';
                document.getElementById('specifyInput').style.display = 'none';
                workSpecialization_fieldDiv.style.display = 'none';
                schoolField.removeAttribute('readonly');
                schoolField.required = true;
                employerField.value = '';
                workSpecialization_field.value = '';
                workSpecialization_field.options[2].value = "others"; //return back the value of option:other
                workSpecialization_field.required = false
                employerField.required = false
                otherSpecialization_field.required = false;
            } else if (occupationalStatus.value === 'employed') {
                schoolFieldDiv.style.display = 'none';
                employerFieldDiv.style.display = 'block';
                workSpecialization_fieldDiv.style.display = 'block';
                employerField.removeAttribute('readonly');
                workSpecialization_field.required = true;
                employerField.required = true;
                schoolField.value = '';
                schoolField.required = false;

            }
        }
    }

    function csuccMemberRadio_listener() {
        // Check if CSUCC member radio button is checked
        if (csuccMemberRadio.checked) {
            // Set the value of employer or school to "Caraga State University Cabadbaran Campus"
            if (occupationalStatus.value === 'student') {
                schoolFieldDiv.style.display = 'block';
                employerFieldDiv.style.display = 'none';
                document.getElementById('specifyInput').style.display = 'none';
                workSpecialization_fieldDiv.style.display = 'none';
                schoolField.value = 'Caraga State University Cabadbaran Campus';
                schoolField.setAttribute('readonly', 'readonly');
                employerField.value = '';
                workSpecialization_field.value = '';
                workSpecialization_field.options[2].value = "others"; //return back the value of option:other
                workSpecialization_field.required = false
                employerField.required = false
                otherSpecialization_field.required = false;
            } else if (occupationalStatus.value === 'employed') {
                schoolFieldDiv.style.display = 'none';
                employerFieldDiv.style.display = 'block';
                workSpecialization_fieldDiv.style.display = 'block';
                schoolField.value = '';
                employerField.value = 'Caraga State University Cabadbaran Campus';
                // workSpecialization_field.value = '';
                workSpecialization_field.required = true;
                employerField.setAttribute('readonly', 'readonly');
            }
        }
    }



    // Add event listeners:
    occupationalStatus.addEventListener('change', occupationStatus_listener);


    guestRadio.addEventListener('change', guestRadio_listener); // Add event listeners to Guest radio button

    csuccMemberRadio.addEventListener('change', csuccMemberRadio_listener); //Add event listeners to csuccMember button

    document.getElementById("myForm").addEventListener("submit", disableButton); //disable button after submit/restirck multiple submissions

    otherSpecialization_field.addEventListener('focusout', otherSpecialization_fieldListener) //set value after done typing

    guestRadio_listener();
    csuccMemberRadio_listener()


});


