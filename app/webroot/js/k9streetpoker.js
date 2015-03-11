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
});

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