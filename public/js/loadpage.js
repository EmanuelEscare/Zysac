
// window.onload = function(){
//     setTimeout(removeScreen, 200);

//     function removeScreen(){
//         document.getElementById('loadPage').classList.add("closeScreen");

//         document.getElementById('contentPage').classList.remove("contentBody");
//     }

// }



window.load = function(){
     addScreen();
}


window.onload = function(){
    setTimeout(removeScreen, 1000);

    function removeScreen() {
        document.getElementById('loadPage').classList.add("closeScreen");
    
        document.getElementById('contentPage').classList.remove("contentBody");
    }
}


function addScreen() {
    document.getElementById('loadPage').classList.remove("closeScreen");

    document.getElementById('contentPage').classList.add("contentBody");
}

