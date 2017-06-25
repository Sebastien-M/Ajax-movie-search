document.body.querySelector("#moviename").addEventListener("keyup", function(){
    showHint(this.value);
});
function showHint(str) {
    if (str.length == 0) {
        document.body.querySelector(".suggestion").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.body.querySelector(".suggestion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "suggestion.php?q=" + str, true);
        xmlhttp.send();
    }
}