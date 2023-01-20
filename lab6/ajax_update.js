$("#update").on("click", function ()
{
    let name = $("#name").val();
    let client = $("#client").val();
    let dateofcreation = $("#dateofcreation").val();
    let link = $("#link").val();
    $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {'name': name, 'price': client, 'dateofcreation': dateofcreation, 'link': link},
        dataType: 'html'
    })
})