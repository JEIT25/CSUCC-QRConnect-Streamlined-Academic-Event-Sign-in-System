function disableButton() {
    // Disable the button to prevent multiple submissions
    document.getElementById("submitBtn").disabled = true;
}

function showSpecifyInput(select) {
    var specifyInput = document.getElementById('specifyInput');
    if (select.value === 'others') {
        specifyInput.style.display = 'block';
    } else {
        specifyInput.style.display = 'none';
    }
}
document.addEventListener('DOMContentLoaded', function () {
    // Get the elements
    const occupationalStatus = document.getElementById('occupational_status');
    const schoolField = document.getElementById('schoolField');
    const employerField = document.getElementById('employerField');
    const workSpecialization_Field = document.getElementById('work_specialization');
    const guestRadio = document.getElementById('guestRadio');
    const csuccMemberRadio = document.getElementById('csuccMemberRadio');

    // Add event listener to occupational status select
    occupationalStatus.addEventListener('change', function () {
        // Check the selected value
        if (occupationalStatus.value === 'student') {
            if (guestRadio.checked) {
                schoolField.style.display = 'block';
                employerField.style.display = 'none';
                workSpecialization_Field.style.display = 'none';
                schoolField.value = '';
                schoolField.removeAttribute('readonly');
            } else if (csuccMemberRadio.checked) {
                schoolField.style.display = 'block';
                employerField.style.display = 'none';
                workSpecialization_Field.style.display = 'none';
                schoolField.value = 'Caraga State University Cabadbaran Campus';
                schoolField.setAttribute('readonly','readonly');
            }
        } else if (occupationalStatus.value === 'employed') {
            if (guestRadio.checked) {
                schoolField.style.display = 'none';
                employerField.style.display = 'block';
                workSpecialization_Field.style.display = 'block';
                employerField.value = '';
                workSpecialization_Field.value = '';
                employerField.removeAttribute('readonly');
            } else if (csuccMemberRadio.checked) {
                schoolField.style.display = 'none';
                employerField.style.display = 'block';
                workSpecialization_Field.style.display = 'block';
                employerField.value = 'Caraga State University Cabadbaran Campus';
                employerField.setAttribute('readonly', 'readonly');
            }
        }
    });

    // Add event listeners to radio buttons
    guestRadio.addEventListener('change', function () {
        if (guestRadio.checked) {
            if (occupationalStatus.value === 'student') {
                schoolField.style.display = 'block';
                employerField.style.display = 'none';
                workSpecialization_Field.style.display = 'none';
                schoolField.removeAttribute('readonly');
                schoolField.required = true;
                schoolField.value = '';
            } else if (occupationalStatus.value === 'employed') {
                schoolField.style.display = 'none';
                employerField.style.display = 'block';
                workSpecialization_Field.style.display = 'block';
                employerField.removeAttribute('readonly');
                employerField.value = '';
                workSpecialization_Field.required = true;
                employerField.required = true;
            }
        }
    });

    csuccMemberRadio.addEventListener('change', function () {
        // Check if CSUCC member radio button is checked
        if (csuccMemberRadio.checked) {
            // Set the value of employer or school to "Caraga State University Cabadbaran Campus"
            if (occupationalStatus.value === 'student') {
                schoolField.style.display = 'block';
                employerField.style.display = 'none';
                workSpecialization_Field.style.display = 'none';

                schoolField.value = 'Caraga State University Cabadbaran Campus';
                schoolField.setAttribute('readonly', 'readonly');
            } else {
                schoolField.style.display = 'none';
                employerField.style.display = 'block';
                workSpecialization_Field.style.display = 'block';

                employerField.value = 'Caraga State University Cabadbaran Campus';
                employerField.setAttribute('readonly', 'readonly');
                workSpecialization_Field.required = true;
            }
        }
    });
});

document.getElementById("myForm").addEventListener("submit", disableButton);
