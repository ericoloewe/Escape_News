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
        var page = $("#actualpage").text();
        var type = $("#type").val();

        $.get(
            "/torneios/gettorneios/" + name + "/" + page + "/" + type,
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
});

function mascaraPhone(telefone){ 
   if(telefone.value.length == 0)
     telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
   if(telefone.value.length == 3)
      telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.
 
 if(telefone.value.length == 9)
     telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
  
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