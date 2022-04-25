//Validando Input do Valor da Moeda para não permitir Letras e nenhem repetir o caracter '.'
var moeda_valor=document.querySelector('#moeda_valor')

//Bloquear Letras
moeda_valor.addEventListener('keypress', (e) => {
    var keycode= e.keyCode || e.which

    if (!((keycode > 47 && keycode < 58) || keycode==46 )) {
        e.preventDefault()
    }
})

//Não permitir repetir '.'
moeda_valor.addEventListener('keypress', (e)=>{
   
    var keycode=e.keyCode|| e.which
    var charCode=String.fromCharCode(keycode)

    if (moeda_valor.value.includes(charCode) && keycode == 46) {
        e.preventDefault()
    }
})
//Impedir '.' Sem número algum
moeda_valor.addEventListener('keypress', (e)=>{
   
    var keycode=e.keyCode|| e.which
    
    if (moeda_valor.value.length==0 && keycode == 46) {
        
        e.preventDefault()
    }
})
