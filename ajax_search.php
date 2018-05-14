<html>
<head>

    <style>
        span {
            color: green;
        }
    </style>
    <title>AJAX SEARCHING</title>
</head>

    <script type="text/javascript">
        xmlhttp=new XMLHttpRequest();

        function makerequest(given_text,objID) {

            //alert(given_text);
          var  serverPage='search.php?text='+given_text;

            xmlhttp.open("GET",serverPage);

            xmlhttp.onreadystatechange=function () {
                if (xmlhttp.readyState==4 || xmlhttp.status==200){
                  //  alert(xmlhttp.responseText);// for checking response type
                  //  alert(xmlhttp.status);//for checking status
                    document.getElementById(objID).innerHTML=xmlhttp.responseText;
                }

            }
            xmlhttp.send(null);

        }
        function ajax_delete(id,objID) {

            //alert(given_text);
            var  serverPage='search.php?id='+id;

            xmlhttp.open("GET",serverPage);

            xmlhttp.onreadystatechange=function () {
                if (xmlhttp.readyState==4 || xmlhttp.status==200){
                    //  alert(xmlhttp.responseText);// for checking response type
                    //  alert(xmlhttp.status);//for checking status
                    document.getElementById(objID).innerHTML=xmlhttp.responseText;
                }

            }
            xmlhttp.send(null);

        }

    </script>


<body onload="makerequest('','res')">
<span>Given Text</span>
<input type="text" id="given_text" onkeyup="makerequest(this.value,'res')">
<br>
<br/>

<hr/>
<span id="res"></span>


</body>
</html>