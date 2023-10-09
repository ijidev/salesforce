// Get references to the modal and buttons
var modal = document.getElementById('myModal');
var openModalBtn = document.getElementById('openModalBtn');
var closeModalBtn = document.getElementById('closeModalBtn');

// Function to open the modal
function openModal() {
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    modal.style.display = 'none';
}

// Event listeners for opening and closing the modal
openModalBtn.addEventListener('click', openModal);
closeModalBtn.addEventListener('click', closeModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        closeModal();
    }
});





// cert modal and buttons
var certmodal = document.getElementById('certModal');
var certModalBtn = document.getElementById('certModalBtn');
var certCloseBtn = document.getElementById('certCloseBtn');

// Function to open the modal
function openCertModal() {
    certmodal.style.display = 'block';
}

// Function to close the modal
function closeCertModal() {
    certmodal.style.display = 'none';
}

// Event listeners for opening and closing the modal
certModalBtn.addEventListener('click', openCertModal);
certCloseBtn.addEventListener('click', closeCertModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target == certmodal) {
        closeCertModal();
    }
});




// faq modal and buttons
var faqmodal = document.getElementById('faqModal');
var faqModalBtn = document.getElementById('faqModalBtn');
var faqCloseBtn = document.getElementById('faqCloseBtn');

// Function to open the modal
function openFaqModal() {
    faqmodal.style.display = 'block';
}

// Function to close the modal
function closeFaqModal() {
    faqmodal.style.display = 'none';
}

// Event listeners for opening and closing the modal
faqModalBtn.addEventListener('click', openFaqModal);
faqCloseBtn.addEventListener('click', closeFaqModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target == faqmodal) {
        closeFaqModal();
    }
});




// about modal and buttons
var aboutmodal = document.getElementById('aboutModal');
var aboutModalBtn = document.getElementById('aboutModalBtn');
var aboutCloseBtn = document.getElementById('aboutCloseBtn');

// Function to open the modal
function openAModal() {
    aboutmodal.style.display = 'block';
}

// Function to close the modal
function closeAModal() {
    aboutmodal.style.display = 'none';
}

// Event listeners for opening and closing the modal
aboutModalBtn.addEventListener('click', openAModal);
aboutCloseBtn.addEventListener('click', closeAModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target == aboutmodal) {
        closeAModal();
    }
});


// Event modal and buttons
var eventmodal = document.getElementById('eventModal');
var eventModalBtn = document.getElementById('eventModalBtn');
var eventCloseBtn = document.getElementById('eventCloseBtn');

// Function to open the modal
function openEvModal() {
    eventmodal.style.display = 'block';
}

// Function to close the modal
function closeEvModal() {
    eventmodal.style.display = 'none';
}

// Event listeners for opening and closing the modal
eventModalBtn.addEventListener('click', openEvModal);
eventCloseBtn.addEventListener('click', closeEvModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target == eventmodal) {
        closeEvModal();
    }
});
// Event modal and buttons
var checkmodal = document.getElementById('checkModal');
var checkModalBtn = document.getElementById('checkModalBtn');
var checkCloseBtn = document.getElementById('checkCloseBtn');

// Function to open the modal
function openChModal() {
    checkmodal.style.display = 'block';
}

// Function to close the modal
function closeChModal() {
    checkmodal.style.display = 'none';
}

// Event listeners for opening and closing the modal
checkModalBtn.addEventListener('click', openChModal);
checkCloseBtn.addEventListener('click', closeChModal);

// Close the modal if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (event.target == checkmodal) {
        closeChModal();
    }
});



//  document.addEventListener('DOMContentLoaded', function() {
//             var calendarEl = document.getElementById('calandar');

//             var calendar = new fullCalendar.Calendar(calendarEl, {
//                 initialView: 'dayGridMonth', // Set the initial view to month
//                 initialDate: '<?= now()->toDateString() ?>', // Set the current date
//                 events: [
//                     // You can add events here
//                     // Example:
//                     // {
//                     //     title: 'Event 1',
//                     //     start: '2023-09-29',
//                     //     end: '2023-09-30'
//                     // }
//                 ]
//             });

//             calendar.render();
//         });