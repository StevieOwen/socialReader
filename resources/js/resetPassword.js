const checkForm=document.querySelector('#checkEmail');
const resetForm=document.querySelector('#resetForm');
const cust_id=localStorage.getItem('cust-id');
const pwd_cont=document.querySelector(".pwd-cont");
const alert=document.querySelector('.alert');
const email_tosend=checkForm.querySelector('input[name="cust_email"]');
let email_tokeep="";

checkForm.addEventListener('submit',(e)=>{
    e.preventDefault();

    const formData = new FormData(checkForm);
    const data = Object.fromEntries(formData.entries());
    fetch(`/checkEmail`,{
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
            checkForm.querySelector('.alert').classList.add('d-none');
            checkForm.querySelector('.alert').classList.remove('error');

            checkForm.classList.add('d-none');
            resetForm.classList.remove('d-none');
            localStorage.setItem('email',email_tosend.value)
        }else{
            checkForm.querySelector('.alert').classList.remove('d-none');
            checkForm.querySelector('.alert').classList.add('error');
            checkForm.querySelector('.alert').textContent=data.message;
            
        }
      })  
})

resetForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    let email=localStorage.getItem('email');
    const formData = new FormData(resetForm);
    const data = Object.fromEntries(formData.entries());
    data.cust_email=email;
    fetch(`/resetPassword`,{
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
        console.log(data);
        if(data.status=="success"){
           resetForm.querySelector('.alert').classList.remove('error');
           resetForm.querySelector('.alert').classList.add('success');
           resetForm.querySelector('.alert').textContent="Password reset, you will be redirected to the login in few";
            setTimeout(()=>{
                window.location.href="/login";
            },2500)


        }else{
           resetForm.querySelector('.alert').classList.add('error')
           resetForm.querySelector('.alert').textContent=data.message;
        }
      })

})