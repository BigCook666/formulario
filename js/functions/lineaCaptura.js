
  console.log('peticion');
  const folio = document.getElementById('folio').value;
  const contribuyente = document.getElementById('contribuyente').value;
  const generar = document.getElementById('generar');
  
  const createAlert = ( text ) =>{
    const error = document.getElementById('error');
    const div = document.createElement('div');
    div.classList.add('alert','alert-danger');
    div.innerText = text;
    error.append(div);
  }
  
  const createIframe = ( url ) =>{
    const exito = document.getElementById('exito');
    const a = document.createElement('a');
    a.href=url;
    a.innerText='Descargar'
    a.classList.add('btn','btn-vino');
    exito.append(a);
  }
  
  const myHeaders = new Headers();
  myHeaders.append("Authorization", "Token 20b6ec0b64a68ad33af0959e239461ed98e47a91");
  
  const formdata = new FormData();
  formdata.append("folio_seguimiento", `U-${folio}`);
  formdata.append("tramite", "5");
  formdata.append("importe", "94");
  formdata.append("contribuyente", contribuyente);
  
  const requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: formdata,
    redirect: 'follow'
  };
  
 
  fetch("https://testpagos.tabasco.gob.mx/fin-client/pago-referenciado/", requestOptions)
    .then(response => response.json())
    .then(result => {
      if(result['text']){
        console.log('entron');
        createAlert(result.text[0].text);
          
      }else{
        console.log(result);
        createIframe(result['url_formato']);
    
      }
    
    })
    .catch(error => console.warn('error', error));
    
  // createIframe('https://testpagos.tabasco.gob.mx/fin-client/pdf/U-170/');
    