//Função Para Conversão de Moeda
function conversorMoeda() {
    //Pegando Valores dos Inputs
    var moeda_inic  = document.getElementById('moeda_inicial').value
    var moeda_final = document.getElementById('moeda_final').value
    var moeda_valor = document.getElementById('moeda_valor').value

    //Requisição a Taxa de Cambio
    var request = new XMLHttpRequest()
    
    request.open('GET','taxa_cambio.json')
    
    request.onreadystatechange = () =>{
        if (request.readyState == 4 && request.status == 200 ) { 
            var jsonCambio = request.responseText
            var objJsonCambio = JSON.parse(jsonCambio)
            
            if (moeda_inic == moeda_final) {

                console.log('Moedas iguais');
                
            } else {
                for (const key in objJsonCambio) {

                    const array_moedas = objJsonCambio[key];
                    
                    for (const i in array_moedas) {
                        var item_moeda = array_moedas[i]
                        var array_rates=item_moeda.rate.split('-')
                        //Verificando o Tipo de Conversão
                        if (item_moeda.currency == moeda_inic && array_rates[1] == moeda_final) {

                           var res_conversao = moeda_valor*array_rates[0]
                            
                            document.getElementById('resultado_rate').innerText = res_conversao
                            document.getElementById('resultado_currency').innerText = array_rates[1]
                            
                        } else{
                            continue
                        }
                    }
                }
                
            }
            
            
        } else if (request.readyState == 4 && request.status == 404) {
           console.log('Erro na requisição') 
        } 
    }

    request.send()
   
}
//Selecionando dias
function fDias(value) {
    return value
}

//Selecionando Banco
function taxaJuros(banks) {
    //Variaveis Iniciais
    var moeda_valor = document.getElementById('moeda_valor').value
    var banco = document.getElementById(banks)
    var tb    = banco.getElementsByTagName('td')
    var arry_tb =Array()

    //Receber Quantidade de Dias
    var dias = fDias(document.getElementById('dias').value)
    
    for (let i = 1; i < 4; i++) {
       // console.log(tb[i].innerText.replace(',','.'))
        arry_tb.push(parseFloat(tb[i].innerText.replace(',','.')))
    }

   var res_juros = (parseFloat(moeda_valor)*(arry_tb[dias]/100))+parseFloat(moeda_valor)

   return res_juros
}

function fResultado() {
    var moeda_valor = document.getElementById('moeda_valor').value
    //alert(moeda_valor)
    if (moeda_valor>=50000 && moeda_valor<=5000000) {
        document.getElementById('resultado').innerText=taxaJuros(document.getElementById('banco').value)
    }
    else{
        alert('Digite um valor de mínimo 50.000 e no máximo 5.000.000')
    }
    
}
function editarRegistro(id) {
   
    //Add Inputs as Tags de Tabela(td) para edição:
    //Selecionando as Linhas e Suas Celulas:
    var id_selecao='tr_'+id
    var tr=document.getElementById(id_selecao)
   
    var td=tr.getElementsByTagName('td')
    //Limpando A tags TD
    var descricao=td[1].innerText
    var valor=td[3].innerText
    location.href='editar_registro.php?id='+id+'&descricao='+descricao+'&valor='+valor+''
    
}
//Verificar Outros 
function verificarOutros() {
    
    var tipo_despasa=document.getElementById('tipo_outros')
    var tipo_despasa_select=document.getElementById('tipo')
    
    
    if (tipo_despasa_select.value=='outras') {
        tipo_despasa.style.display = 'block'
        tipo_despasa_select.name='tipo_aux'
        tipo_despasa.name='tipo'
        console.log(tipo_despasa_select.value,'Select='+tipo_despasa_select.name,'Input='+tipo_despasa.name);
    }
    else{
        tipo_despasa.style.display = 'none'
        tipo_despasa_select.name='tipo'
        tipo_despasa.name='tipo_outros'
        console.log(tipo_despasa_select.value,'Select='+tipo_despasa_select.name,'Input='+tipo_despasa.name);
        
    }
    
}
function setValorDespesa() {

    //Selecionando Elementos:
    var div_card_form=document.getElementById('card-form')
    
    
    //Criando Elementos HTML:
    var inputValor=document.createElement('input')
    inputValor.type='number'
    inputValor.placeholder="Valor das Despesas"
    inputValor.name='valor_mes'
    inputValor.id="valor_mes"
    inputValor.className='form-control form-control-sm'

    var form=document.createElement('form')
    form.method='post'
    form.action='php/function.php'
    form.id='form'
   
    var div=document.createElement('div')
    div.classList.add('form-group')

    var button=document.createElement('button')
    button.type='submit'
    button.id="id_submit"
    button.name='mes_valor'
    button.innerText="Guardar"
    button.className='btn btn-sm btn-primary mr-2'


    var button_cancel=document.createElement('a')
    button_cancel.id="id_cancel"
    button_cancel.innerText="Cancelar"
    button_cancel.className='btn btn-sm btn-secondary text-white '
    //Criando Arvore DOM:
    div.appendChild(inputValor)
    form.appendChild(div)
    form.appendChild(button)
    form.appendChild(button_cancel)
    
    div_card_form.appendChild(form)

    var p=document.getElementById('plus_p')
    var h5=document.getElementById('h5')
    var content_valor=document.getElementById('content_valor')

    if (document.getElementById('plus_p')) {
        document.getElementById('plus_p').remove()
    } else if (document.getElementById('content_valor')) {
      document.getElementById('content_valor').remove()
    }  
   document.getElementById('id_cancel').addEventListener('click',()=>{
        if (h5) {
            div_card_form.appendChild(content_valor)
            document.getElementById('form').remove()
        } else {
            document.getElementById('form').remove()
            div_card_form.appendChild(p)
        }
    })
    
    //Validando Input do Valor da Moeda para não permitir Letras e nenhem repetir o caracter '.'
    var valor_mes=document.querySelector('#valor_mes')
    
    //Bloquear Letras
    valor_mes.addEventListener('keypress', (e) => {
        var keycode= e.keyCode || e.which

        if (!((keycode > 47 && keycode < 58) || keycode==46 )) {
            e.preventDefault()
        }
    })

    //Não permitir repetir
    valor_mes.addEventListener('keypress', (e)=>{
        var keycode=e.keyCode|| e.which
        
        var charCode=String.fromCharCode(keycode)
    
        if (valor_mes.value.includes(charCode) && keycode == 46) {
            e.preventDefault()
        }
    })
    //Impedir '.' Sem número algum
    valor_mes.addEventListener('keypress', (e)=>{

       var keycode=e.keyCode|| e.which

       if (valor_mes.value.length==0 && keycode == 46) {

           e.preventDefault()
       }
    })
  }

    function esconderContainer() {
     
      var width=window.innerWidth
      var check=document.getElementById('check')
      if (width<=575.98 && !check.checked) {
        document.getElementById('container').style.display='none'
      } else {
        document.getElementById('container').style.display='block'
      }
    }

setTimeout( ()=>{
    document.getElementById('success').remove()
},3000)
