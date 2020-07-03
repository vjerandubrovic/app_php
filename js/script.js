document.addEventListener('keydown', (e)=>{

    if(e.ctrlKey && e.keyCode == 80){

        let button;

        button = document.getElementById('prikazi');

        button.style.display = "none";

    }

})

document.addEventListener("click", (e)=>{

    let button;

    button = document.getElementById('prikazi');

    button.style.display = "block";


})