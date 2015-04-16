$(function () {
    $("#inameuser").keyup(function () {
        var name = $("#inameuser").val();
        var page = $("#actualpage").text();

        $.get(
            "/jogadores/getusers/" + name + "/" + page,
            null,
            function (result) {
                $("#searchTable").html(result);
            }
        );
    });
    $("#inametournament").keyup(function () {
        var name = $("#inametournament").val();
        var page = $("#actualaction").text();
        var controller = $("#actualcontroller").text();
        var type = $("#type").val();

        $.get(
            "/torneios/gettorneios/" + name + "/" + page + "/" + type + "/" + controller,
            null,
            function (result) {
                $("#searchTable").html(result);
            }
        );
    });
    $("#calendar").datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "pt-BR",
        autoclose: true,
        todayHighlight: true
    });
    $("#inputDataTorneio").change(function () {
        data = $(this).val().split("/");
        var date = new Date(data[2], data[1], data[0]);
        $("#TorneioData").val(date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate());
    });
    $("#end").click(function () {
        if ($("#sectionchecked").val() == 0) {
            var tour = $("#idtorneio").val();
            var sec = $("#actualsection").val();
            $("#sectionchecked").val(1);
            $(".inputsections input").css("visibility", "visible");
            $.ajax({
                type: "POST",
                data: { id: tour },
                url: "/JogadoresTorneios/addSecaoTorneio/"
            });
        }
    });
    $("#EditarIDVideo").click(function () {
        var idv = youtube_parser($("#idvideo").val());
        $.get(
            "/JogoAgora/Editar/" + idv,
            null,
            function () {
                window.location.assign("/JogoAgora/Ver");
            }
        );
    });
    $("#replysubmit").click(function () {
        $("#ForumTopicosMensagem").val($("#divText").html());
        $("#ForumVerAssuntoForm").submit();
    });
});

function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match&&match[7].length==11){
        return match[7];
    }else{
        alert("Url incorreta");
    }
}

function mascaraPhone(telefone){ 
   if(telefone.value.length == 0)
     telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(telefone.value.length == 3)
      telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(telefone.value.length == 9)
     telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
}

function addJogadorTorneio(element,idjog,idtor)
{
    if ($(element).is(':checked')) {
        $.ajax({
            type: "POST",
            data: { idjogador: idjog, idtorneio: idtor },
            url: "/torneios/addJogadorTorneio/"
        });
    } else {
        $.ajax({
            type: "POST",
            data: { idjogador: idjog, idtorneio: idtor },
            url: "/torneios/delJogadorTorneio/"            
        });
    }
}

function mascaraData(data){ 
   if(data.value.length == 2)
      data.value = data.value + '/';
 
 if(data.value.length == 5)
     data.value = data.value + '/';  
}

function pegarCaminhoArquivo()
{
    var input = document.getElementById("InputFile");
    var fReader = new FileReader();    
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function (event)
    {
        var img = document.getElementById("img-new");
        img.src = event.target.result;
    }
}

function turnOn(obj)
{
    var form = "#" + obj;
    $(form).css("visibility", "visible");
}

function turnOff(obj)
{
    var form = "#" + obj;
    $(form).css("visibility", "hidden");
}

function editarPontuacaoSecaoSemID(idjog,sec)
{
    var valor = "#PontuacaoJogador" + idjog + "Secao" + sec;
    var val = $(valor).val();
    var idtor = $("#idtorneio").val();
    var idV=0;
    $.ajax({
        type: "POST",
        data: { secao: sec, idjogador: idjog, idtorneio: idtor },
        url: "/JogadoresTorneios/getId/",
        dataType: "html",
        success: function (result) {
            idV = result;   
            $.ajax({
                type: "POST",
                data: { id:idV, pontuacao: val},
                url: "/JogadoresTorneios/editarPontuacaoSecao/"
            });         
        }
    });    
}

function editarPontuacaoSecao(idjog,sec)
{
    var valor = "#PontuacaoJogador" + idjog + "Secao" + sec;
    var idSP = "#IDJogador" + idjog + "Secao" + sec;
    var idV = $(idSP).val();
    var val = $(valor).val();

    $.ajax({
        type: "POST",
        data: { id:idV, pontuacao: val},
        url: "/JogadoresTorneios/editarPontuacaoSecao/"
    });
}

function colocaArquivoTextarea()
{
    var input = document.getElementById("InputFile");
    var fReader = new FileReader();    
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function (event)
    {
        $(".form-control").html(
            "<img class='img-thumbnail' src=" + event.target.result + " style='max-width: 100%; max-height: 100%;' alt='20'><br>"
        );
    }
}