var valor_leilao = 0;
var id_leilao = 0;
var id_produto = 0;
var id_categoria = 0;
var id_user = 0;

//Funções de verificação

function validar_input(inputs){
    var list = [];

    inputs.forEach(function (id, i){
        if($(id).val() == ""){
            list.push(id);
        }
    });
    return list;
}

function alerta(title, desc, type){
    Swal.fire({
        title: title,
        text: desc,
        icon: type,
        confirmButtonText: 'Confirmar'
    });
}

function style(campo, prop, val){
    campo.forEach(function(id, i){
        $(id).css(prop, val);
    });
}

function validar_check(id){
    if($(id).is(":checked")){
        return 1;
    }else{
        return 0;
    }
}

function disabled(campo, value){

    campo.forEach(function(id, i) {
        $(id).prop("disabled", value);
    });
}

function functionAtualizarLance(){
    $.ajax({
        url : "../request/request_atu_lance.php",
        type : 'post',
        data : {
            eIdLei: $("#spanIdLei").text()
        },
        beforeSend : function(){
            //$("#resultado").html("ENVIANDO...");
        }
    })
    .done(function(msg){

        var j = JSON.parse(msg);

        $(".box-history-lance").html("");

        var html = $(".box-history-lance").html();

        j.forEach((element, index)=> {

            if(index == 0){
                $("#nomeGan").text(element.nome_tb_usuario);
            }

            $("#valorLance").text("R$ " + parseFloat(element.valor_tb_leilao).toFixed(2));

            

            $("#spanStaLei").text("Aberto");

            $("#eValLan").removeAttr("disabled");
            $("#btnCadLan").removeAttr("disabled");

            var cod_lei = element.id_tb_lance;

            $("#valorLance").text("R$ " + parseFloat(element.valor_tb_leilao).toFixed(2));

            valor_leilao = parseFloat(element.valor_tb_leilao);

            console.log(valor_leilao);

            if(parseInt(type)){
                html += "<p><i class='bi bi-star'></i> Código lance: "+cod_lei+" - <i class='bi bi-currency-dollar'></i> Valor ofertado: R$"+parseFloat(element.valor_tb_lance).toFixed(2)+" - <i class='bi bi-calendar-check'></i> Data/Hora: " + element.data_hora_cadastro_tb_lance + "<br><a href='#' id_user='"+element.id_tb_usuario+"' title='Visualizar detalhes do usuário?'><i class='bi bi-person-fill'></i> "+element.nome_tb_usuario+"</a></p>";
            }else{

                if(element.id_tb_usuario == id_usuario){
                    html += "<p><strong style='color:green'>"+element.nome_tb_usuario+"</strong> <i class='bi bi-star'></i> - <i class='bi bi-currency-dollar'></i> Valor: R$"+element.valor_tb_lance+" - " + element.data_hora_cadastro_tb_lance + "</p>";
                }else{
                    html += "<p><i class='bi bi-currency-dollar'></i> Valor: R$"+element.valor_tb_lance+" - " + element.data_hora_cadastro_tb_lance + "</p>";
                }
                
            }

            if(parseInt(element.status_tb_leilao)){
                $("#eValLan").removeAttr("disabled");
                $("#btnCadLan").removeAttr("disabled");
                $("#spanStaLei").text("Aberto");
            }else{
                $("#spanStaLei").text("Fechado");
                disabled(["#eValLan", "#btnCadLan"], "true");
            }
        });

        $(".box-history-lance").html(html);


    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });
}

//Scripts do Sistema

$(document).ready(function(){

    $(".box-history-lance").on("click", "a", function(){
        //alert($(this).attr("id_user"));
        $("#modalVisUsu").modal("show");

        $.ajax({
            url : "../request/request_con_usuario.php",
            type : 'post',
            data : {
                eIdUsu: parseInt($(this).attr("id_user"))
            },
            beforeSend : function(){
                //$("#resultado").html("ENVIANDO...");
            }
        })
        .done(function(msg){
        
            var obj = JSON.parse(msg);
    
            $("#spanUsuNom").text(obj[0].nome_tb_usuario);
            $("#spanUsuTel").text(obj[0].telefone_tb_usuario);
    
        })
        .fail(function(jqXHR, textStatus, msg){
            alert(msg);
        });
    });
    
    $("#btnSalvar").on("click", function(){

        var form = validar_input(['#eNom', '#eDes']);
        
        if(form.length){
            style(form, "border-color", "red");
            alerta("Atenção!", "Favor, preencha todos os campos em vermelho!", "error");
        }else{

            $.ajax({
                url : "../request/request_cad_categoria.php",
                type : 'post',
                data : {
                    eNom: $("#eNom").val(),
                    eDes: $("#eDes").val()
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
        
                console.log(msg);
        
                var obj = JSON.parse(msg);
        
                if(obj[0]){
                    alerta("Sucesso!", obj[1], "success");
                    $(".box-cad-categoria input").val("");
                }else{
                    alerta("Atenção!", obj[1], "danger");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });

        }

    });

    $(".box-cad-categoria input").on("keyup",function(){
        $(this).css("border-color", "grey");
    });

    $("#btnPesAva").on("click", function(){
        $("#exampleModal").modal("show");
    });

    $("#btnCadLei").on("click", function(){

        var temp = validar_input(['#eIdPro', "#eValIni", "#eValLan"]);

        if(temp.length){
            style(temp, "border-color", "red");
            alerta("Atenção!", "Os campos em vermelho são obrigatórios!", "error");
        }else{

            $.ajax({
                url : "../request/request_cad_leilao.php",
                type : 'post',
                data : {
                    cSta: validar_check("#cSta"),
                    eValIni: $("#eValIni").val(),
                    eValLan: $("#eValLan").val(),
                    eIdPro: $("#eIdPro").val()
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
        
                if(obj[0]){
                    alerta("Sucesso!", obj[1], "success");
                    $(".box-cad-categoria input").val("");
                }else{
                    alerta("Atenção!", obj[1], "danger");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });
        }

    });

    $("#btnCadLan").on("click", function(){

        var val_l = parseFloat($("#eValLan").val());

        if(!val_l){
            alerta("Atenção", "Favor digite um valor!", "warning");
        }else if((val_l - valor_leilao) < parseFloat(lance_min) || (val_l - valor_tb_leilao) < parseFloat(lance_min)){
            alerta("Atenção", "Digite um valor de lance maior ou igual ao valor mínimo!", "warning");
        }else{

            $.ajax({
                url : "../request/request_cad_lance.php",
                type : 'post',
                data : {
                    eIdLei: parseInt($("#spanIdLei").text()),
                    eValLan: parseFloat(val_l),
                    eIdUsu: parseInt(id_usuario)
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
                console.log(msg);
        
                if(obj[0] == 1){
                    alerta("Sucesso!", obj[1], "success");
                    $("#valorLance").text("R$ "+parseFloat(obj[2]).toFixed(2));
                }else if(obj[0] == 2){
                    alerta("Atenção!", obj[1], "error");
                }else{
                    alerta("Atenção!", obj[1], "error");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });
        }
    });

    $("#btnt").on("click", function(){

        functionAtualizarLance();

    });

    $("#btnLogin").on("click", function(){

        var temp = validar_input(["#eUsu", "#eSen"]);

        if(temp.length){
            alerta("Atenção!", "Os campos em vermelho são obrigatórios!", "warning");
            style(temp, "border-color", "red");
        }else{

            $.ajax({
                url : "request/request_res_login.php",
                type : 'post',
                data : {
                    eUsu: $("#eUsu").val(),
                    eSen: $("#eSen").val()
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
        
                if(obj[0] == 1){
                    alerta("Atenção!", obj[1], "warning");
                }else if(obj[0] == 2){

                    if(parseInt(obj[2].permissao_tb_usuario)){
                        window.location.href = "page/con_leilao.php";
                    }else{
                        window.location.href = "page/index.php";
                    }
                    
                }else if(obj[0] == 0){
                    alerta("Atenção!", obj[1], "warning");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });

        }

    });

    $("#carouselExample img").on("click", function(){
        $("#img-tag").attr("src", $(this).attr("src"));
        $(".box-view").fadeIn(500);
    });

    $("#btnFecVis").on("click", function(){
        $(".box-view").fadeOut(500);
    });

    $("#btnEncLei").on("click", function(){

        Swal.fire({
            title: "Deseja realmente encerrar o leilão atual?",
            showDenyButton: true,
            icon: "question",
            showCancelButton: false,
            confirmButtonText: "Confirmar",
            denyButtonText: `Cancelar`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
            
                $.ajax({
                    url : "../request/request_enc_leilao.php",
                    type : 'post',
                    data : {
                        eIdLei: parseInt($("#spanIdLei").text()),
                        staLei: parseInt(0)
                    },
                    beforeSend : function(){
                        //$("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(msg){
                
                    var obj = JSON.parse(msg);
            
                    if(obj[0]){
                        alerta("Sucesso!", obj[1], "success");
                        $(this).css("disabled", "none");
                    }else{
                        alerta("Atenção!", obj[1], "danger");
                    }
            
                })
                .fail(function(jqXHR, textStatus, msg){
                    alert(msg);
                });

            }else{
                console.log("cancelado");
            }
        });

    });

    $("#btnMais").on("click", function(){

        var temp = parseFloat($("#eValLan").val());

        $("#eValLan").val(parseFloat(parseFloat(lance_min) + temp));
    });

    $("#btnMenos").on("click", function(){

        var temp = parseFloat($("#eValLan").val());

        $("#eValLan").val(parseFloat(temp - parseFloat(lance_min)));
    });

    $("#btnCadUsuario").on("click", function(){

        var temp = validar_input(['#eUsu', '#eSen', '#eNom', '#eTel']);

        if(temp.length){
            style(temp, "border-color", "red");
            alerta("Atenção", "Os campos em vermelho são obrigatórios", "warning");
        }else{

            $.ajax({
                url : "request/request_cad_usuario.php",
                type : 'post',
                data : {
                    eUsu: $("#eUsu").val(),
                    eSen: $("#eSen").val(),
                    eNom: $("#eNom").val(),
                    eTel: $("#eTel").val(),
                    eCpf: $("#eCpf").val(),
                    ePer: parseInt(0)
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
        
                if(obj[0] == 1){
                    alerta("Sucesso!", obj[1], "success");
                    $(".box-form-cad-usu input").val("");
                }else if(obj[0] == 0){

                    alerta("Atenção!", obj[1], "error");
                    
                }else{
                    alerta("Atenção!", obj[1], "warning");
                    style(['#eUsu'], "border-color", "red");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });
        }

    });

    $(".box-form-cad-usu input").on("keyup", function(){
        $(this).css("border-color", "grey");
    });

    $(".box-form-cad-usu select").on("change", function(){
        $(this).css("border-color", "grey");
    });

    $("#tbody-con-leilao button").on("click", function(){

        var id = $(this).attr("idLei");

        id_leilao = parseInt(id);

            switch ($(this).attr("operacao")) {
                case 'btnDel':

                    Swal.fire({
                        title: "Deseja realmente excluir o leilão de Nº"+id+"?",
                        showDenyButton: true,
                        icon: "question",
                        showCancelButton: false,
                        confirmButtonText: "Confirmar",
                        denyButtonText: `Cancelar`
                    }).then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url : "../request/request_del_leilao.php",
                                type : 'post',
                                data : {
                                    eIdLei: parseInt(id)
                                },
                                beforeSend : function(){
                                    //$("#resultado").html("ENVIANDO...");
                                }
                            })
                            .done(function(msg){
                            
                                var obj = JSON.parse(msg);
                        
                                if(obj[0] == 1){
                                    alerta("Sucesso!", obj[1], "success");
                                    $("#row_" + id).css("display", "none");
                                }else if(obj[0] == 2){
                
                                    alerta("Atenção!", obj[1], "error");
                                    
                                }
                        
                            })
                            .fail(function(jqXHR, textStatus, msg){
                                alert(msg);
                            });
                        
                        }

                    });
                    
                break;

                case 'btnEdi':
                    $("#modalEdiLei").modal("show");

                    $.ajax({
                        url : "../request/request_con_leilao.php",
                        type : 'post',
                        data : {
                            eIdLei: parseInt(id)
                        },
                        beforeSend : function(){
                            //$("#resultado").html("ENVIANDO...");
                        }
                    })
                    .done(function(msg){
                    
                        var obj = JSON.parse(msg);
                
                        $("#sStaLeiEdi").val(obj[0].status_tb_leilao);
                        $("#eValLanEdi").val(parseFloat(obj[0].valor_min_tb_leilao).toFixed(2));
                        $("#eNomProE").val("Cód: " + obj[0].id_tb_produto + " - " + obj[0].nome_tb_produto);
                
                    })
                    .fail(function(jqXHR, textStatus, msg){
                        alert(msg);
                    });

                break;
            }

        

    });

    $("#tbody-con-produto button").on("click", function(){
        var id = $(this).attr("idPro");
        id_produto = parseInt(id);

        switch ($(this).attr("operacao")) {
            case 'btnDel':

                Swal.fire({
                    title: "Deseja realmente excluir o produto de Nº"+id+"?",
                    showDenyButton: true,
                    icon: "question",
                    showCancelButton: false,
                    confirmButtonText: "Confirmar",
                    denyButtonText: `Cancelar`
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            url : "../request/request_del_produto.php",
                            type : 'post',
                            data : {
                                eIdPro: parseInt(id)
                            },
                            beforeSend : function(){
                                //$("#resultado").html("ENVIANDO...");
                            }
                        })
                        .done(function(msg){
                        
                            var obj = JSON.parse(msg);
                    
                            if(obj[0] == 1){
                                alerta("Sucesso!", obj[1], "success");
                                $("#row_" + id).css("display", "none");
                            }else if(obj[0] == 2){
            
                                alerta("Atenção!", obj[1], "error");
                                
                            }
                    
                        })
                        .fail(function(jqXHR, textStatus, msg){
                            alert(msg);
                        });

                    }

                });

            break;
            
            case 'btnEdi':

                $("#modalEdiPro").modal("show");

                $.ajax({
                    url : "../request/request_con_produto.php",
                    type : 'post',
                    data : {
                        eIdPro: parseInt(id),
                    },
                    beforeSend : function(){
                        //$("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(msg){
                
                    var obj = JSON.parse(msg);

                    $("#eNomProEdi").val(obj[0].nome_tb_produto);
                    $("#eDesProEdi").val(obj[0].descricao_tb_produto);
                    $("#eValProEdi").val(parseFloat(obj[0].valor_min_tb_produto).toFixed(2));
            
                })
                .fail(function(jqXHR, textStatus, msg){
                    alert(msg);
                });

            break;
        }
    });

    $("#tbody-con-categoria button").on("click", function(){

        var id = $(this).attr("eIdCat");
        id_categoria = parseInt(id);

        switch ($(this).attr("operacao")) {
            case 'btnDel':

                Swal.fire({
                    title: "Deseja realmente excluir a categoria de Nº"+id+"?",
                    showDenyButton: true,
                    icon: "question",
                    showCancelButton: false,
                    confirmButtonText: "Confirmar",
                    denyButtonText: `Cancelar`
                }).then((result) => {
                    
                    if (result.isConfirmed) {

                        $.ajax({
                            url : "../request/request_del_categoria.php",
                            type : 'post',
                            data : {
                                eIdCat: parseInt(id)
                            },
                            beforeSend : function(){
                                //$("#resultado").html("ENVIANDO...");
                            }
                        })
                        .done(function(msg){
                        
                            var obj = JSON.parse(msg);
                    
                            if(obj[0] == 1){
                                alerta("Sucesso!", obj[1], "success");
                                $("#row_" + id).css("display", "none");
                            }else if(obj[0] == 2){
            
                                alerta("Atenção!", obj[1], "error");
                                
                            }
                    
                        })
                        .fail(function(jqXHR, textStatus, msg){
                            alert(msg);
                        });

                    }

                });

            break;

            case 'btnEdi':

                $("#modalEdiCat").modal("show");

                $.ajax({
                    url : "../request/request_con_categoria.php",
                    type : 'post',
                    data : {
                        eIdCat: parseInt(id)
                    },
                    beforeSend : function(){
                        //$("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(msg){
                
                    var obj = JSON.parse(msg);
            
                    $("#eNomCatEdi").val(obj[0].nome_tb_categoria);
                    $("#eDesCatEdi").val(obj[0].descricao_tb_categoria);
            
                })
                .fail(function(jqXHR, textStatus, msg){
                    alert(msg);
                });

            break;
        }
    });

    $("#tbody-con-usuario button").on("click", function(){

        var id = $(this).attr("eIdUsu");

        id_user = parseInt(id);

        switch ($(this).attr("operacao")) {
            case 'btnDel':

                Swal.fire({
                    title: "Deseja realmente excluir o usuário de Nº"+id+"?",
                    showDenyButton: true,
                    icon: "question",
                    showCancelButton: false,
                    confirmButtonText: "Confirmar",
                    denyButtonText: `Cancelar`
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            url : "../request/request_del_usuario.php",
                            type : 'post',
                            data : {
                                eIdUsu: parseInt(id)
                            },
                            beforeSend : function(){
                                //$("#resultado").html("ENVIANDO...");
                            }
                        })
                        .done(function(msg){
                        
                            var obj = JSON.parse(msg);
                    
                            if(obj[0] == 1){
                                alerta("Sucesso!", obj[1], "success");
                                $("#row_" + id).css("display", "none");
                            }else if(obj[0] == 2){
            
                                alerta("Atenção!", obj[1], "error");
                                
                            }
                    
                        })
                        .fail(function(jqXHR, textStatus, msg){
                            alert(msg);
                        });

                    }

                });

            break;

            case 'btnEdi':

                $("#modalEdiUsu").modal("show");

                $.ajax({
                    url : "../request/request_con_usuario.php",
                    type : 'post',
                    data : {
                        eIdUsu: parseInt(id),
                    },
                    beforeSend : function(){
                        //$("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(msg){
                
                    var obj = JSON.parse(msg);

                    $("#eNomUsuEdi").val(obj[0].nome_tb_usuario);
                    $("#eCpfUsuEdi").val(obj[0].cpf_tb_usuario);
                    $("#eUsuUsuEdi").val(obj[0].usuario_tb_usuario);
                    $("#eWhaUsuEdi").val(obj[0].telefone_tb_usuario);
                    $("#ePerUsuEdi").val(obj[0].permissao_tb_usuario);
            
                })
                .fail(function(jqXHR, textStatus, msg){
                    alert(msg);
                });

            break;
        }
    });
    
    $("#btnCadUseAdm").on("click", function(){

        var temp = validar_input(['#eNom', '#eUsu', '#eSen', '#eTel', '#ePer']);

        if(temp.length){
            style(temp, "border-color", "red");
            alerta("Atenção!", "Todos os campos em vermelho são obrigatórios!", "error");
        }else{

            $.ajax({
                url : "../request/request_cad_usuario.php",
                type : 'post',
                data : {
                    eUsu: $("#eUsu").val(),
                    eSen: $("#eSen").val(),
                    eNom: $("#eNom").val(),
                    eTel: $("#eTel").val(),
                    eCpf: $("#eCpf").val(),
                    ePer: parseInt($("#ePer").val())
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
        
                if(obj[0] == 1){
                    alerta("Sucesso!", obj[1], "success");
                    $(".box-form-cad-usu input").val("");
                    $(".box-form-cad-usu select").val("");
                }else if(obj[0] == 0){
                    alerta("Atenção!", obj[1], "error");
                }else{
                    alerta("Atenção!", obj[1], "warning");
                    style(['#eUsu'], "border-color", "red");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });

        }

    });

    $("#eIdPro").on("keyup", function(){

        var temp = $(this).val();

        if(temp.length >= 1){

                $.ajax({
                    url : "../request/request_con_produto.php",
                    type : 'post',
                    data : {
                        eIdPro: parseInt($("#eIdPro").val()),
                    },
                    beforeSend : function(){
                        //$("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(msg){
                
                    var obj = JSON.parse(msg);

                    if(obj[0]){

                        $("#box-form-lei").fadeIn(500, function(){
                            $(".result-search-pro").html("<label><strong><i class='bi bi-box-seam'></i> Produto:</strong> "+obj[0].nome_tb_produto+"</label> <br> <label><strong><i class='bi bi-currency-dollar'></i> Valor: </strong>R$ "+parseFloat(obj[0].valor_min_tb_produto).toFixed(2)+"</label>");
                        });
                        
                    }else{
                        //alerta("Atenção!", "Produto não encontrado!", "error");
                        $("#box-form-lei").fadeOut(500);
                    }
            
                })
                .fail(function(jqXHR, textStatus, msg){
                    alert(msg);
                });


        }else{
            $("#box-form-lei").fadeOut(500);
        }
    });

    $("#btnSalLeiEdi").on("click", function(){

        var temp = validar_input(["#sStaLeiEdi", "#eValLanEdi"]);

        if(temp.length){

            alerta("Atenção!", "Todos os campos são obrigatórios!", "warning");
            style(temp, "border-color", "red");

        }else{

            Swal.fire({
                title: "Deseja realmente salvar as alterações?",
                showDenyButton: true,
                icon: "question",
                showCancelButton: false,
                confirmButtonText: "Confirmar",
                denyButtonText: `Cancelar`
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url : "../request/request_atu_leilao.php",
                        type : 'post',
                        data : {
                            eValLanEdi: $("#eValLanEdi").val(),
                            sStaLeiEdi: $("#sStaLeiEdi").val(),
                            eIdLei: id_leilao
                        },
                        beforeSend : function(){
                            //$("#resultado").html("ENVIANDO...");
                        }
                    })
                    .done(function(msg){
                    
                        var obj = JSON.parse(msg);
                
                        if(obj[0] == 1){
                            alerta("Sucesso!", obj[1], "success");
                        }else if(obj[0] == 2){
                            alerta("Atenção!", obj[1], "error");
                        }
                
                    })
                    .fail(function(jqXHR, textStatus, msg){
                        alert(msg);
                    });

                }

            });
        }
    });

    $("#btnSalProEdi").on("click", function(){
        var temp_pro = validar_input(["#eNomProEdi", "#eDesProEdi", "#eValProEdi"]);

        if(temp_pro.length){
            alerta("Atenção!", "Os campos em vermelho são obrigatórios, favor, corrigir!", "warning");
            style(temp_pro, "border-color", "red");
        }else{

            Swal.fire({
                title: "Deseja realmente salvar as alterações?",
                showDenyButton: true,
                icon: "question",
                showCancelButton: false,
                confirmButtonText: "Confirmar",
                denyButtonText: `Cancelar`
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url : "../request/request_atu_produto.php",
                        type : 'post',
                        data : {
                            eNomProEdi: $("#eNomProEdi").val(),
                            eDesProEdi: $("#eDesProEdi").val(),
                            eValProEdi: $("#eValProEdi").val(),
                            eIdPro: id_produto
                        },
                        beforeSend : function(){
                            //$("#resultado").html("ENVIANDO...");
                        }
                    })
                    .done(function(msg){
                    
                        var obj = JSON.parse(msg);
                
                        if(obj[0] == 1){
                            alerta("Sucesso!", obj[1], "success");
                        }else if(obj[0] == 2){
                            alerta("Atenção!", obj[1], "error");
                        }
                
                    })
                    .fail(function(jqXHR, textStatus, msg){
                        alert(msg);
                    });

                }

            });

        }
    });

    $("#btnSalCatEdi").on("click", function(){

        var temp = validar_input(["#eNomCatEdi", "#eDesCatEdi"]);

        if(temp.length){
            alerta("Atenção!", "Os campos em vermelho são obrigatórios!", "warning");
            style(temp, "border-color", "red");
        }else{

            $.ajax({
                url : "../request/request_atu_categoria.php",
                type : 'post',
                data : {
                    eNomCatEdi: $("#eNomCatEdi").val(),
                    eDesCatEdi: $("#eDesCatEdi").val(),
                    eIdCat: id_categoria
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
        
                if(obj[0] == 1){
                    alerta("Sucesso!", obj[1], "success");
                }else if(obj[0] == 2){
                    alerta("Atenção!", obj[1], "error");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });

        }

    });

    $("#btnSalUsuEdi").on("click", function(){

        var temp = validar_input(["#eNomUsuEdi", "#eCpfUsuEdi", "#eUsuUsuEdi", "#eWhaUsuEdi", "#ePerUsuEdi"]);

        if(temp.length){
            alerta("Atenção!", "Os campos em vermelho são obrigatórios!", "error");
            style(temp, "border-color", "red");
        }else{

            $.ajax({
                url : "../request/request_atu_usuario.php",
                type : 'post',
                data : {
                    eIdUsu: id_user,
                    eNomUsuEdi: $("#eNomUsuEdi").val(),
                    eCpfUsuEdi: $("#eCpfUsuEdi").val(),
                    eUsuUsuEdi: $("#eUsuUsuEdi").val(),
                    eWhaUsuEdi: $("#eWhaUsuEdi").val(),
                    ePerUsuEdi: $("#ePerUsuEdi").val()
                },
                beforeSend : function(){
                    //$("#resultado").html("ENVIANDO...");
                }
            })
            .done(function(msg){
            
                var obj = JSON.parse(msg);
        
                if(obj[0] == 1){
                    alerta("Sucesso!", obj[1], "success");
                }else if(obj[0] == 2){
                    alerta("Atenção!", obj[1], "error");
                }
        
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            });

        }

    });

    $("#cStaEdi").on("change", function(){
        var temp = 0;
        if(validar_check(this)){
            temp = 1;
        }

        $.ajax({
            url : "../request/request_enc_leilao.php",
            type : 'post',
            data : {
                eIdLei: parseInt($("#spanIdLei").text()),
                staLei: parseInt(temp)
            },
            beforeSend : function(){
                //$("#resultado").html("ENVIANDO...");
            }
        })
        .done(function(msg){
        
            var obj = JSON.parse(msg);
    
            if(obj[0]){

                if(temp){
                    alerta("Sucesso!", "Leilão aberto com sucesso!", "success");
                }else{
                    alerta("Sucesso!", "Leilão encerrado com sucesso!", "success");
                }

            }else{
                alerta("Atenção!", obj[1], "danger");
            }
    
        })
        .fail(function(jqXHR, textStatus, msg){
            alert(msg);
        });

    });

});