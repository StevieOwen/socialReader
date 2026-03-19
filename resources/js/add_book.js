let customer_id=localStorage.getItem('customer_id');

//submit books data
document.getElementById('bookInput').addEventListener('change', function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : "Choose a PDF or EPUB file";
    document.getElementById('fileNameDisplay').textContent = fileName;
});
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