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