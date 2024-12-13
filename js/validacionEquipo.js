$(document).ready(function(){
    $('#teamForm').submit(function(e){
        e.preventDefault();
        let teamName=$('#teamName').val();
        let teamYear=$('#teamYear').val();
        let stadiumName=$('#stadiumName').val();
        let teamImg=$('#teamImg').val();
        let submitContent=true;
        

        if(typeof teamName!== 'string'||teamName.trim()==''){
            $('#nameMsg').html("Por favor inserte un nombre válido en este campo");
            submitContent=false;
        }
        if(isNaN (teamYear)||teamYear.trim()==''){
            $('#yearMsg').html("Por favor inserte un año válido en este campo");
            submitContent=false;
        }
        if( typeof stadiumName!=='string'||stadiumName.trim()==''){
            $('#stadiumMsg').html("Por favor inserte un nombre de estadio válido en este campo");
            submitContent=false;
        }

        if (submitContent){

            $('#budgetMsg').html("Equipo creado, presupuesto inicial de 100");
        }
        
    })
})


