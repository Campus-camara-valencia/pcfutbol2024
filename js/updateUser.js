$(document).ready(function () {

    //CAMPOS VIEJOS
    let name = $("#name").val();
    let email = $("#email").val();
    let birthDate = $("#birthDate").val();

    $.ajax({
        type: "POST",
        url: "./php/session.php",
        dataType: "JSON",
        success: function (response) {

            if(response.success){

                let name = response.name();
                let email = response.email();
                let birthDate = response.birthDate();

            };
        }

        })
    
        $("#updateFields").click(function () { 

        let newCampos = [];

        //CAMPOS NUEVOS
        let newName = $("#name")
        let newEmail = $("#email")
        let newBirthDate= $("#birthDate")

        if(name != newName){
            newCampos.push(newName);
        }
        if(email != newEmail){
            newCampos.push(newEmail);
        }
        if(birthDate != newBirthDate){
            newCampos.push(newBirthDate);
        }

        if(newCampos.length > 0){

            $.ajax({
                type: "POST",
                url: "./php/updateUser.php",
                data: {
    
                    NewCampos: newCampos
                    
    
                },
                dataType: "dataType",
                success: function (response) {
                    
                }
             });
        }else{
            alert("No se han realizado cambios.")
        }

            
        });

        $("updatePass").click(function () { 

            let newpass2 = $("pass2").val();
            let newpass3 = $("pass3").val();

            if(newpass2 != newpass3){
                alert("Las contraseñas deben coincidir.")
            }

            
        });

    
    });
;
    
    
