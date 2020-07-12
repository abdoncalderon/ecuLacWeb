



$(function () {
    $("#ubicacion").click(function(){
        
        if (!!navigator.geolocation){
            
                navigator.geolocation.getCurrentPosition(
                    function(position){
                        
                        
                        document.getElementById("latitud").value = position.coords.latitude;
                        document.getElementById("longitud").value = position.coords.longitude;
                        /* infoWindow = new google.maps.InfoWindow({map: map});
                        var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                        map.panTo(pos); */
                    },
                    function(){
                        alert("Navegador no permite localización");
                    }
                );
            }else{
                alert("Navegador no soporta localización");
        }
    });

    $("#categoria_id").change(
        function(event){
            alert("Hola");
            $.get("/getCategoriaProducto/"+event.target.value+"", 
                function(response,state){
                    console.log(response);
                    $("#tipo_id").empty();
                    for(i=0;i<response.length;i++){
                        $("#tipo_id").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                    }
                    $("#presentation_id").empty();
                    for(i=0;i<response.length;i++){
                        $("#presentation_id").append("<option value='"+response[i].id+"'> "+response[i].envase+"</option>");
                    }
                });
        }
    );
    


});



