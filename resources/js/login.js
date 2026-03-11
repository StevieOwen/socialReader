const cust_id=localStorage.getItem('cust-id');
const alert=document.querySelector('.alert');
const loginForm=document.querySelector('#loginForm');
const reset_pwd=document.querySelector("#reset-pwd");


loginForm.addEventListener('submit',(e)=>{
    e.preventDefault();

    const formData = new FormData(loginForm);
    const data = Object.fromEntries(formData.entries());
    data.cust_id=cust_id;

    fetch('/login',{
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
             alert.classList.remove('error')
            alert.classList.add('success');
            alert.textContent=data.message;
            setTimeout(()=>{
              window.location.href='/'  
            },2500)

        }else if(data.status=="error"){
            if(data.message=='Email not verified'){
                 alert.classList.add('error');
                 alert.textContent=`${data.message} " You'll be redirected to email verification page"`;
                 setTimeout(()=>{
                     window.location.href='/emailVerification' 
                 },2500)
            }else{
                 alert.classList.add('error');
                 alert.textContent=data.message;
            }

        }

      })

})

//reset password

// reset_pwd.addEventListener('click',(e)=>{
//     e.preventDefault();
//     window.location.href="/resetPassword";
// })