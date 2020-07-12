<script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="application/javascript" defer></script>

<script src="{{ asset('js/app.js') }}" type="application/javascript" defer></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

{{-- <script src="../../js/ecolacweb.js" type="text/javascript" ></script> --}}


{{-- <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin="">
</script> --}}

    
{{-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAx6CUd0YIGPfCwGUl0QTmc-axQ7G2z8c&callback=initMap">
</script> --}}

{{-- <script>
    $(function () {
         $("#ubicacion").click(function(){
            
            if (!!navigator.geolocation){
                
                    navigator.geolocation.getCurrentPosition(
                        function(position){
                            
                            
                            document.getElementById("latitud").value = position.coords.latitude;
                            document.getElementById("longitud").value = position.coords.longitude;
                            infoWindow = new google.maps.InfoWindow({map: map});
                            var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                            map.panTo(pos);
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
                
                $.get("/getTiposCategoria/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#tipo_id").empty();
                        for(i=0;i<response.length;i++){
                            $("#tipo_id").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                            alert(response[i].nombre);
                        }
                        
                    });
                $.get("/getPresentacionesCategoria/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#presentacion_id").empty();
                        for(i=0;i<response.length;i++){
                            $("#presentacion_id").append("<option value='"+response[i].id+"'> "+response[i].envase+"/"+response[i].contenido+"/"+response[i].medida+"</option>");
                        }
                    
                    });
            }
        );


    }); --}}
 
<script>

    $(function () {
        $("#categoria_id").change(
            function(event){
                $("#tipo_id").empty();
                $.get("/getTiposCategoria/"+event.target.value+"", 
                    function(response,state){
                        console.log(response)
                        
                        for(i=0;i<response.length;i++){
                            $("#tipo_id").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                        }
                        
                    });
                $("#presentacion_id").empty();
                $.get("/getPresentacionesCategoria/"+event.target.value+"", 
                    function(response,state){
                        console.log(response)
                        
                        for(i=0;i<response.length;i++){
                            $("#presentacion_id").append("<option value='"+response[i].id+"'> "+response[i].envase+" / "+response[i].contenido+" / "+response[i].medida+"</option>");
                        }
                    
                    });
            }
        );
        
    });

 

</script>

