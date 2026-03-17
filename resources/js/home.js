let customer_name=localStorage.getItem('customer_name');
let token=localStorage.getItem('token');
if(!token){
    window.location.href="/login";
}

let logout_btn=document.querySelector('#logout-btn');

logout_btn.addEventListener('click',(e)=>{
    
    fetch('/logout',{
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            // Include CSRF token if this route is in web.php
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }

    }).then(response => {
        // Regardless of server success, we clear the local state
        localStorage.removeItem('token');
        window.location.href = '/login';
    })
    .catch(error => console.error('Logout failed:', error));
})

const user_name=document.querySelector('.user-name');
const aside=document.querySelector('aside');
const sidemenu_btn=document.querySelector('.burger-menu');
const main_section=document.querySelector('.main-section');
const body=document.querySelector('body');
user_name.textContent=customer_name;


  body.addEventListener('click',(e)=>{
    // console.log(e.target.parentElement.parentElement)
    if (window.matchMedia("(min-width: 481px) and (max-width:767px)").matches || window.matchMedia("(min-width: 320px) and (max-width:480px)").matches ) 
        {
            const burger = e.target.closest('.burger-menu');
            if (burger){
                sidemenu_btn.classList.replace('show','hide');
                aside.classList.replace('hide','show');
                aside.classList.replace('col-3','col-5');
                main_section.classList.replace('col-9','col-7');
                aside.style.display='block';
            }else{
                if (aside.classList.contains('show')){
                    sidemenu_btn.classList.replace('hide','show');
                    aside.classList.replace('col-5', 'col-3');
                    aside.classList.replace('show','hide');
                }
            }
        }else if(window.matchMedia("(min-width: 768px) and (max-width:1024px)").matches){
            aside.classList.replace('col-5','col-3');
            main_section.classList.replace('col-7','col-9');
        
            
        }else if(window.matchMedia("(min-width: 1025px) and (max-width:1280px)").matches){
            
            aside.classList.replace('col-5','col-3');
            main_section.classList.replace('col-7','col-9');
        
            
        }

})




aside.addEventListener('click',e=>{
    e.preventDefault();
    const clicked=e.target.closest('li')
    const menu_items=document.querySelectorAll('.menu-item');
    menu_items.forEach(item => {
        if(item.classList.contains('active')){
            item.classList.remove('active');
        }
    });

    clicked.classList.add('active')
        
    
})