let customer_name=localStorage.getItem('customer_name');
let customer_id=localStorage.getItem('customer_id');
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
const view_books=document.querySelector('#view-books');
const showform_book=document.querySelector('#add-book');
const form_section=document.querySelector('#form-add-book');
const library_section=document.querySelector('#library_section');

showform_book.addEventListener('click',(e)=>{
    e.preventDefault();
    form_section.classList.remove('d-none');
    library_section.classList.add('d-none');

})

view_books.addEventListener('click',(e)=>{
    e.preventDefault();
    form_section.classList.add('d-none');
    library_section.classList.remove('d-none');
})

//submit books data

const bookUpload_form=document.querySelector('#bookUpload-form');

bookUpload_form.addEventListener('submit',(e)=>{
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const btn = form.querySelector('button');
    const alert =document.querySelector(".alert");
    formData.append('cust_id',customer_id);
    btn.disabled = true;
    btn.innerText = "Uploading Book...";

    fetch(`/addBook`,{
        method: "POST",
        body: formData,
        headers: {
            // Laravel requires the CSRF token in the header for AJAX/Fetch
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        }   
    }).then(response=>response.json())
      .then(data=>{
        if(data.status=="success"){
            alert.classList.remove('d-none');
            alert.classList.remove('error');
            alert.classList.add('success');
            alert.textContent=data.message;
             setTimeout(()=>{
               alert.classList.add("d-none");
               alert.classList.remove('success');
               bookUpload_form.reset();
               btn.disabled = false;
               btn.innerText = " Upload to Library"; 

             },1000)
        }else{
            alert.classList.remove('d-none');
            alert.classList.add('error');
            alert.textContent=data.message;
            btn.disabled = false;
            btn.innerText = " Upload to Library";   
        }
    })  

})


const userData = new FormData();
userData.append('cust_id',customer_id);


fetch(`fetchBook`,{
     method: "POST",
    body: userData,
    headers: {
        // Laravel requires the CSRF token in the header for AJAX/Fetch
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        'Accept': 'application/json'
    }   
}).then(response=>response.json())
  .then(data=>{
        const book_shelf=document.querySelector('#book-shelf');
        const books=data.datas;
        books.forEach((book)=>{
            console.log(book)
            book_shelf.innerHTML+=`<div class="card book-card" style="width: 18rem; ">
                                    <div class="card-body">
                                        <h5 class="card-title">${book['book_title']}</h5>
                                        <h5 class="card-title">${book['book_author']}</h5>
                                        <button type="button" id="read">Start Reading</button>
                                    </div>
                                    </div>`
        })


})