const cust_id=localStorage.getItem('cust-id');
const verificationForm=document.querySelector('#emailVerificationForm');
const alert=document.querySelector('.alert');
const token=document.querySelector("#token");
const resend_code=document.querySelector(".resendCode-btn");
const verify_btn=document.querySelector('.verify-btn');



verificationForm.addEventListener('submit',(e)=>{
    e.preventDefault();

    const formData = new FormData(verificationForm);
    const data = Object.fromEntries(formData.entries());
    data.cust_id=cust_id;
    fetch(`/emailVerification`,{
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
            alert.classList.remove('error');
            alert.classList.add('success'); 
            alert.textContent=data.message;
            setTimeout(()=>{
                window.location.href="/login";
            },2500)
        }else if(data.status=="expired"){
            resend_code.classList.remove('d-none');
            verify_btn.classList.add("d-none");

            alert.classList.add('error');
            alert.textContent=data.message
        }else{
            alert.classList.add('error');
            alert.textContent=data.message
            token.value="";
        }
    });



})

resend_code.addEventListener('click',(e)=>{
    e.preventDefault();

    e.target.classList.add('d-none');
    alert.classList.add("d-none");
    spinner.classList.remove('d-none');

    const formData = new FormData(verificationForm);
    const data={
        'cust_id':cust_id
    }

    fetch(`/resendCode`,{
    method: 'POST', 
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        // Laravel needs this header for AJAX POST requests
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }, 
    body: JSON.stringify(data)

    }).then(response=>response.json())
       .then(data=>{
        console.log(data)
        if(data.status=="success"){
            spinner.classList.add('d-none');
            verify_btn.classList.remove("d-none");
        }
       })


})