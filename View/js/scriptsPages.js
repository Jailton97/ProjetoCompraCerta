function RedirecionarPaginas() {
    let usuario = document.forms['loginForm']['email'].value
    
    if (usuario === 'cliente') {
        window.location.href = "index.html";
    } else if(usuario === 'funcionario') {
        window.location.href = "setorConferencia.php";
    } else if(usuario === 'adm'){
        window.location.href = "admin.html";
    } else {
        window.location.href = "erro.html";
    }
}