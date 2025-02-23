import toastr from "toastr";

// Configurar Toastr
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 5000,
};

// Hacer Toastr disponible globalmente
window.toastr = toastr;