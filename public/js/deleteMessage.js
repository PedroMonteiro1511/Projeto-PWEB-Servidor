$('.btn-danger').on('click', function (e){

    e.preventDefault();

    const href = $(this).attr('href')

    Swal.fire({
        title: 'Tem a certeza que deseja continuar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#008000',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'

    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
})











