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
    login_btn.style.color='#6071B6';

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


let pwd_icon = document.getElementById('pwd-icon');
let pwd = document.getElementById('pwd');

const path_lock = `<path d="M128 96l0 64 128 0 0-64c0-35.3-28.7-64-64-64s-64 28.7-64 64zM64 160l0-64C64 25.3 121.3-32 192-32S320 25.3 320 96l0 64c35.3 0 64 28.7 64 64l0 224c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 224c0-35.3 28.7-64 64-64z"/>`;
const path_unlock = `<path d="M256 160C256 124.7 284.7 96 320 96C351.7 96 378 119 383.1 149.3C386 166.7 402.5 178.5 420 175.6C437.5 172.7 449.2 156.2 446.3 138.7C436.1 78.1 383.5 32 320 32C249.3 32 192 89.3 192 160L192 224C156.7 224 128 252.7 128 288L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 288C512 252.7 483.3 224 448 224L256 224L256 160z"/>`;

pwd_icon.addEventListener('click', (e) => {
    // 1. Check current state
    if (pwd.type === 'password') {
        // Switch to visible
        pwd.setAttribute('type', 'text');
        pwd_icon.innerHTML = path_unlock;
    } else {
        // Switch to hidden
        pwd.setAttribute('type', 'password');
        pwd_icon.innerHTML = path_lock;
    }
});