let customer_name=localStorage.getItem('customer_name');
let customer_id=localStorage.getItem('customer_id');
let token=localStorage.getItem('token');
if(!token){
    window.location.href="/login";
}

let logout_btn=document.querySelector('#logout-btn');

// log the user out, once clicked on the logout button
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

const user_names=document.querySelectorAll('.user-name');
const aside=document.querySelector('aside');
// const sidemenu_btn=document.querySelector('.burger-menu');
// const main_section=document.querySelector('.main-section');
// const body=document.querySelector('body');

//add the user name on the navigation(top and side)
user_names.forEach((user_name)=>{user_name.textContent=customer_name;})

// change the active link on the side menu
aside.addEventListener('click',e=>{
    e.preventDefault();
    const clicked=e.target.closest('a')
    const menu_items=document.querySelectorAll('.menu-item');
    menu_items.forEach(item => {
        if(item.classList.contains('active')){
            item.classList.remove('active');
        }
    });

    clicked.classList.add('active')
        
})
// redirect to the form for adding button once cliked on add Book
const add_book_btn=document.querySelector('.add-book-btn');
add_book_btn.addEventListener('click',(e)=>{
    window.location.href='/addBook'
})

// Fetching user uploaded book, to add on the library 
const userData = new FormData();
userData.append('cust_id',customer_id);

fetch(`fetchBook`,{
    method: "POST",
    body: userData,
    headers: {
        // Laravel requires the CSRF token in the header for AJAX/Fetch
         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json'
    }   
}).then(response=>response.json())
  .then(data=>{
        const book_grid=document.querySelector('.book-grid');
        const books=data.datas;
        books.forEach((book)=>{             
            // console.log(book)        
            book_grid.innerHTML+=`<div class="book-card">
                                    <img src="https://covers.openlibrary.org/b/id/8231996-L.jpg">
                                    <div class="book-info">
                                        <h3>${book['book_title']}</h3>
                                        <p>${book['book_author']}</p>

                                        <div class="progress-bar">
                                            <div style="width: 65%"></div>
                                        </div>

                                        <span>Page 123 of 197</span>

                                        <button type="button" class="read-btn" data-path="${book['book']}"  data-id="${book.book_id}" >Continue Reading</button>
                                    </div>
                                </div>`
    })                            


book_grid.addEventListener('click', (e) => {
    // Check if the clicked element is one of our buttons
        if (e.target.classList.contains('read-btn')) {
            // Get the ID from the data attribute of the button that was clicked
            const bookId = e.target.getAttribute('data-id');
            const book_path=e.target.getAttribute('data-path');
            // Save to localStorage
            localStorage.setItem('bookId', bookId);
            localStorage.setItem('book',book_path);
            // Redirect
            window.location.href = "/renderBook";
        }
    });
})

