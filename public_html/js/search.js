function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("qury").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("qury").innerHTML = xhttp.responseText;

    }
  };

  xhttp.open("GET", "search.php?q="+str, true);
  xhttp.send();   
}

function showHint_url(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("steamqry").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("steamqry").innerHTML = xhttp.responseText;

    }
  };

  xhttp.open("GET", "search_url.php?sq="+str, true);
  xhttp.send();   
}