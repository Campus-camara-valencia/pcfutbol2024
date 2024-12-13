$(document).ready(function () {
    
    
    $("#register").click(function () { 
        
        let teamName = $("#teamName").val();
        let presidentName = $("#hiddenPresident").data("presidentname");
        let fundationYear = $("#hiddenPresident").data("fundationyear");
        let stadiumName = $("#stadiumName").val();
        let budget = 100;
        //imagen

        
        
        $.ajax({
            type: "POST",
            url: "./php/addTeam.php",
            data: {

                teamName: teamName,
                stadiumName: stadiumName,
                budget: budget,
                teamImg: teamImg

            },
            dataType: "dataType",
            success: function (response) {
                
            }
        });

        let team = new team(teamName,presidentName,fundationYear,stadiumName,budget,urlImage)

    });

    


});
