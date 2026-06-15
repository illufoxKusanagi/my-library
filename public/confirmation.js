function confirmDelete(message, itemId, event) {
    event.preventDefault(); // Prevent the default form submission behavior
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.getElementById(`deleteForm${itemId}`);
            if (form) {
                form.submit();
            } else {
                console.error('Form not found!');
            }
        }
    });
}

function confirmDeleteBook(message, itemId, event) {
    event.preventDefault(); // Prevent the default form submission behavior
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.getElementById(`deleteForm${itemId}`);
            if (form) {
                form.submit();
            } else {
                console.error('Form not found!');
            }
        }
    });
}

function confirmDeleteUser(message, itemId, event) {
    event.preventDefault(); // Prevent the default form submission behavior
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.getElementById(`deleteForm${itemId}`);
            if (form) {
                form.submit();
            } else {
                console.error('Form not found!');
            }
        }
    });
}

function confirmItem(message, itemId, event) {
    event.preventDefault(); // Prevent the defa cult form submission behavior
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.getElementById(`restoreForm${itemId}`);
            if (form) {
                form.submit();
            } else {
                console.error('Form not found!');
            }
        }
    });
}
