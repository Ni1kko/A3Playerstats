function includeHTML() {
    var z, i, elmnt, file, xhttp; 
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
        elmnt = z[i];
        file = elmnt.getAttribute("load-html");
        if (file) { 
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                if (this.status == 200) {elmnt.innerHTML = this.responseText;}
                if (this.status == 404) {elmnt.innerHTML = "<h3 style='color:black; background-color:white'>"+file+" not found</h3>";} 
                    elmnt.removeAttribute("load-html");
                    includeHTML();
                }
            }      
            xhttp.open("GET", file, true);
            xhttp.send(); 
            return;
        }
    }
};

includeHTML();

 