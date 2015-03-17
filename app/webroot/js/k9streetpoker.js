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