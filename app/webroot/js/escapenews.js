$(function () {
    $("#inameuser").keyup(function () {
        var name = $("#inameuser").val();
        var page = $("#actualpage").text();

        $.get(
            "/usuarios/getusers/" + name + "/" + page,
            null,
            function (result) {
                $("#searchTable").html(result);
            }
        );
    });
    $(".error-message").ready(function () {
        $(".error-message").css("visibility", "hidden");
        $(".error-message").css("position", "absolute");
        if ($(".error-message").html())
            alert($(".error-message").html());
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

function colocarNovaFoto()
{
    var input = document.getElementById("InputFile");
    var fReader = new FileReader();    
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function (event) {
        var img = document.getElementById("img-new");
        img.src = event.target.result;
        $("#ImagensImagem").val(event.target.result);
    }
}

function turnOn(obj)
{
    var form = "#" + obj;
    $(form).css("visibility", "visible");
}

function changePosition(obj)
{
    var form = "#" + obj;
    $(form).css("position", "relative");
}

function turnOff(obj)
{
    var form = "#" + obj;
    $(form).css("visibility", "hidden");
}

function enviarImagem()
{
    var input = document.getElementById("InputFile");
    var fReader = new FileReader();    
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function () {
        if (input.files[0].size < 3145728) {
            $("#ForumTopicosMensagem").val(
                "<img class='img-thumbnail' src=" + fReader.result + " style='max-width: 100%; max-height: 100%;' alt='20'><br>"
            );
            $("#ForumVerAssuntoForm").submit();
        }
        else
            alert("Imagem maior do que 3MB!");
    }    
}

function enviarNoticiaComImagem()
{
    var input = document.getElementById("InputFile");
    var fReader = new FileReader();    
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function () {
        if (input.files[0].size < 3145728) {
            $("#NoticiaMensagem").val(
                "<img class='img-thumbnail' src=" + fReader.result + " style='max-width: 100%; max-height: 100%;' alt='20'><br>"
            );
            $("#NoticiaNovaForm").submit();
        }
        else
            alert("Imagem maior do que 3MB!");
    }    
}

function insereImagemDiv()
{
    var input = document.getElementById("InputFile");
    var fReader = new FileReader();    
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function () {
        if (input.files[0].size < 3145728) {
            $("#mensagemAsDiv").html(
                "<img class='img-thumbnail' src=" + fReader.result + " style='max-width: 100%; max-height: 100%;' alt='20'><br>"
            );
        }
        else
            alert("Imagem maior do que 3MB!");
    }    
}