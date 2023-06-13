const form = document.querySelector("form"),
statustxt = form.querySelector(".button-area span");

form.onsubmit = (e) =>{
    e.preventDefault();
    statustxt.style.color="aquamarine";
    statustxt.style.display = "block";

    let xhr = new XMLHttpRequest();
    xhr.open("POST","message.php",true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200) {
            let response = xhr.response;
            if(response.indexOf("please fill the required fields") != -1 || response.indexOf("enter a validate email") || response.indexOf("sorry the msg failes") ){
                statustxt.style.color="red";
            }
            else {
                form.reset();
                setTimeout(()=>{
                    statustxt.style.display = "none";
                },3000);
            }
            statustxt.innerHTML = response;
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}