$("#bCadDep").on("click", function(){

    var nom = $("#eNomDep").val();
    var des = $("#eDesDep").val();

    if(nom == "" || des == ""){
        $("#p_login").html("Preencha todos os campos!");
    }else{

        $.ajax({
            url : "../ajax/req_cad_departamento.php",
            type : 'post',
            data : {
                eNomDep:$("#eNomDep").val(),
                eDesDep:$("#eDesDep").val()
            },
            beforeSend : function(){
                 //$("#resultado").html("ENVIANDO...");
            }
        })
        .done(function(msg){
            const obj = JSON.parse(msg);
    
            $("#p_login").html(obj[1]);
    
        })
        .fail(function(jqXHR, textStatus, msg){
            alert(msg);
        });

    }

});

$("#bCadPro").on("click", function(){

    var grade = $("#sGraPro").val();

    var dados;

    if(grade == 1){
        dados = {
            ePp: $("#ePp").val(),
            eP: $("#eP").val(),
            eM: $("#eM").val(),
            eG: $("#eG").val(),
            eGg: $("#eGg").val(),
            sGraPro: $("#sGraPro").val(),
            eNomPro: $("#eNomPro").val(),
            eDesPro: $("#eDesPro").val(),
            eValCus: $("#eValCus").val(),
            eValAta: $("#eValAta").val(),
            eValVar: $("#eValVar").val(),
            sDepPro: $("#sDepPro").val()
        };
    }else{
        dados = {
            e34: $("#e34").val(),
            e36: $("#e36").val(),
            e38: $("#e38").val(),
            e40: $("#e40").val(),
            e42: $("#e42").val(),
            e44: $("#e44").val(),
            e46: $("#e46").val(),
            sGraPro: $("#sGraPro").val(),
            eNomPro: $("#eNomPro").val(),
            eDesPro: $("#eDesPro").val(),
            eValCus: $("#eValCus").val(),
            eValAta: $("#eValAta").val(),
            eValVar: $("#eValVar").val(),
            sDepPro: $("#sDepPro").val()
        }
    }

    $.ajax({
        url : "../ajax/req_cad_produto.php",
        type : 'post',
        data : dados,
        beforeSend : function(){
             //$("#resultado").html("ENVIANDO...");
        }
    })
    .done(function(msg){
        const obj = JSON.parse(msg);

        $("#p_login").html(obj[1]);

    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });

});