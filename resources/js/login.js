const cust_id=localStorage.getItem('cust-id');
const alert=document.querySelector('.alert');
const loginForm=document.querySelector('#loginForm');
const reset_pwd=document.querySelector("#reset-pwd");
const login_btn=document.querySelector('.login-btn');

loginForm.addEventListener('submit',(e)=>{
    e.preventDefault();

    const formData = new FormData(loginForm);
    const data = Object.fromEntries(formData.entries());
    // data.cust_id=cust_id;
    login_btn.disabled=true;
    login_btn.textContent="Processing...";

    fetch('/login',{
        method: 'POST', 
        credentials: 'include',
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
            login_btn.textContent="Redirecting ...";
            localStorage.setItem('token',data.access_token);
            localStorage.setItem('customer_name',data.customer['name']);
            localStorage.setItem('customer_id',data.customer['id']);

            setTimeout(()=>{
              window.location.href='/home'  
            },1500)

        }else if(data.status=="error"){
            if(data.message=='Email not verified'){
                login_btn.textContent="Redirecting ...";
                 alert.classList.add('error');
                 alert.textContent=`${data.message} " You'll be redirected to email verification page"`;
                 setTimeout(()=>{
                     window.location.href='/emailVerification' 
                 },2500)
            }else{
                 login_btn.disabled=false;
                 login_btn.textContent="Login";
                 alert.classList.add('error');
                 alert.textContent=data.message;
            }

        }

      })

})

