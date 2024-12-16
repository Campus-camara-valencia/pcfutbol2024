$(document).ready(function(){
    $('#enviarEquipo').click(function(){

        let teamName=$('#teamName').val();
        let teamYear=$('#teamYear').val();
        let stadiumName=$('#stadiumName').val();
        let teamImg=$('#teamImg').val();
        let submitContent=true;

        // Limpiar mensajes previos
        $('#nameMsg').html('');
        $('#stadiumMsg').html('');
        $('#budgetMsg').html('');

        // Validar nombre del equipo
        if(teamName.trim()==''){
            $('#nameMsg').html("Por favor inserte un nombre válido en este campo");
            submitContent=false;
        }
        else if (teamName.trim().length < 6) {
            $('#nameMsg').html("El nombre del equipo debe tener al menos 6 caracteres");
            submitContent = false;
        }

        // Validar nombre del estadio
        if(stadiumName.trim()==''){
            $('#stadiumMsg').html("Por favor inserte un nombre de estadio válido en este campo");
            submitContent=false;
        }
        else if (stadiumName.trim().length < 5) {
            $('#stadiumMsg').html("El nombre del estadio debe tener al menos 5 caracteres");
            submitContent = false;
        }
            if (teamImg === '') {
                $('#stadiumMsg').html("Por favor suba una imagen válida");
                submitContent = false;
            }
        //En caso de crear equipo correctamente
        if (submitContent){

            $('#budgetMsg').html("Equipo creado, presupuesto inicial de 100");
        }
        
        })
    })


