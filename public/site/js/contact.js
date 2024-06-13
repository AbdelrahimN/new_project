
const form = document.querySelector('form');
const nameInput = document.getElementById('ab');
const emailInput = document.getElementById('ba');
const subjectInput = document.getElementById('bb');
const messageTextarea = document.getElementById('me');
const sendButton = document.getElementById('send');


function handleFormSubmit(event) {

    event.preventDefault();
    

    if (
        !nameInput.value ||
        !emailInput.value ||
        !subjectInput.value ||
        !messageTextarea.value
    ) {

        alert('Please fill in all required fields.');
    } else {

        console.log('Name:', nameInput.value);
        console.log('Email:', emailInput.value);
        console.log('Subject:', subjectInput.value);
        console.log('Message:', messageTextarea.value);
        

    }
}

form.addEventListener('submit', handleFormSubmit);
