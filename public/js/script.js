document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

// Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
// show navbar
                nav.classList.toggle('show')
// change icon
                toggle.classList.toggle('bx-x')
// add padding to body
                bodypd.classList.toggle('body-pd')
// add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});


document.addEventListener('DOMContentLoaded', function () {
    const eventSelector = document.getElementById('eventSelector');
    const studentSelector = document.getElementById('studentSelector');

    eventSelector.addEventListener('change', function () {
        const selectedEventId = eventSelector.options[eventSelector.selectedIndex].getAttribute('data-event-id');

        fetch(`/getStudentsByEvent/${selectedEventId}`)
            .then(response => response.json())
            .then(data => {
                // Clear existing student options
                studentSelector.innerHTML = '';

                data.forEach(student => {
                    const option = document.createElement('option');
                    option.text = student.name;
                    option.value = student.id;
                    studentSelector.add(option);
                });
            });
    });
});
