const registrationForm=document.querySelector('#registrationForm');

registrationForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    const alert=document.querySelector(".alert");

    const formData = new FormData(registrationForm);
    const data = Object.fromEntries(formData.entries());

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
            alert.classList.add('success');
            alert.textContent="Successfuly created, you will be redirect to another page to verify your email";
            setTimeout(()=>{
                window.location.href="/emailVerification";
            },2000)
            
        }else{
            alert.classList.add('error');
            alert.textContent=data['errors']['cust_password']
        }
       
    })

})

