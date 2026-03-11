const registrationForm=document.querySelector('#registrationForm');
const register_btn=document.querySelector('.register-btn');
const spinner=document.querySelector('#spinner');

registrationForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    const alert=document.querySelector(".alert");

    const formData = new FormData(registrationForm);
    const data = Object.fromEntries(formData.entries());

    //hide register button and show spinner

    register_btn.disabled=true;
    spinner.classList.remove('d-none');

    //clean the alert every time there is an error
    alert.textContent="";
    if(alert.classList.contains('error')){
        alert.classList.remove('error');
    }

    fetch(`/register`,{
    method: 'POST', 
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        // Laravel needs this header for AJAX POST requests
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }, 
    body: JSON.stringify(data)
})
    .then(response=>response.json())
    .then(data=>{
        if(data.status=="success"){
            const cust_id=data.data['cust_id'];
            // console.log(data);
            localStorage.setItem('cust-id',cust_id);
            alert.classList.remove('error');
            alert.classList.add('success');
            alert.textContent="Successfuly created, you will be redirect to another page to verify your email";
            setTimeout(()=>{
                window.location.href="/emailVerification";
            },2500)
            
        }else{
            register_btn.disabled=false;
            spinner.classList.add('d-none');
            alert.classList.add('error');
            if(data['errors']['cust_password']){
                alert.textContent=(data['errors']['cust_password'][0]).replace('cust',"");
            }else if(data['errors']['cust_email']){
                alert.textContent=(data['errors']['cust_email'][0]).replace('cust',"");
            }else{
                alert.textContent=data['errors'];
            }
            
        }
       
    })

})

