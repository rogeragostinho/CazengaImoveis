function openRoute(url) {
    window.location = url
}

function formSubmit() {
    console.log('porra');
    document.querySelector('form#contrato').submit();
}

function pesquisar(){
    let contrato = document.querySelector('select#contrato').value
    let tipo = document.querySelector('select#tipo').value
    let nQuartos = document.querySelector('select#nQuartos').value
    let vMin = document.querySelector('input#vMin').value
    let vMax = document.querySelector('input#vMax').value
    console.log(contrato)
    console.log(tipo)
    console.log(vMax)
    console.log(nQuartos)
    console.log(vMin)
    let url = `/search/${contrato}/${tipo}/${nQuartos}/${vMin}/${vMax}`
    window.location = url
    console.log(window.location.pathName)
}